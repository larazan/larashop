<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Models\Post;
use App\Models\Permission;
use App\Authorizable;

use Session;
use Str;

class PostController extends Controller
{
    

    public function __construct()
	{
		parent::__construct();

		$this->data['currentAdminMenu'] = 'general';
		$this->data['currentAdminSubMenu'] = 'article';
        $this->data['statuses'] = Post::STATUSES;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['articles'] = Post::orderBy('id', 'DESC')->paginate(10);

		return view('admin.posts.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['article'] = null;

		return view('admin.posts.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['title']);

		$image = $request->file('featured_img');
		$name = \Str::slug($params['title']) . '_' . time();
		$fileName = $name . '.' . $image->getClientOriginalExtension();

		$folder = Post::UPLOAD_DIR. '/images';

		$filePath = $image->storeAs($folder . '/original', $fileName, 'public');

		$resizedImage = $this->_resizeImage($image, $fileName, $folder);

		$params['featured_img'] = $filePath;
		// $params['extra_large'] = $resizedImage['extra_large'];
		$params['small'] = $resizedImage['small'];
		// $params['user_id'] = \Auth::user()->id;

		unset($params['image']);


		if (Post::create($params)) {
			\Session::flash('success', 'Article has been created');
		} else {
			\Session::flash('error', 'Article could not be created');
		}

		return redirect('admin/posts');
    }

    private function _resizeImage($image, $fileName, $folder)
	{
		$resizedImage = [];

		$smallImageFilePath = $folder . '/small/' . $fileName;
		$size = explode('x', Post::SMALL);
		list($width, $height) = $size;

		$smallImageFile = \Image::make($image)->fit($width, $height)->stream();
		if (\Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}

		$extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		$size = explode('x', Post::EXTRA_LARGE);
		list($width, $height) = $size;

		$extraLargeImageFile = \Image::make($image)->fit($width, $height)->stream();
		if (\Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
			$resizedImage['extra_large'] = $extraLargeImageFilePath;
		}

		return $resizedImage;
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

		$this->data['post'] = $post;

		return view('admin.posts.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['title']);

        $image = $request->file('featured_img');
        
        if ($image) {
        
            // delete image
            $this->deleteImage($id);
        
            $name = \Str::slug($params['title']) . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = Post::UPLOAD_DIR. '/images';

            $filePath = $image->storeAs($folder . '/original', $fileName, 'public');

            $resizedImage = $this->_resizeImage($image, $fileName, $folder);

            $params['featured_img'] = $filePath;
            // $params['extra_large'] = $resizedImage['extra_large'];
            $params['small'] = $resizedImage['small'];
            // $params['user_id'] = \Auth::user()->id;

            // unset($params['image']);
        }
		
		$post = Post::findOrFail($id);
		if ($post->update($params)) {
			\Session::flash('success', 'Post has been updated.');
		}

		return redirect('admin/posts');
    }

    public function deleteImage($id = null) {
        $postImage = Post::where(['id' => $id])->first();
        $path = 'storage/';
        if (file_exists($path.$postImage->featured_img)) {
            unlink($path.$postImage->featured_img);
        }

        if (file_exists($path.$postImage->small)) {
            unlink($path.$postImage->small);
        }

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post  = Post::findOrFail($id);
        // delete image
        $this->deleteImage($id);

		if ($post->delete()) {
			\Session::flash('success', 'Post has been deleted');
		}

		return redirect('admin/posts');
    }
}
