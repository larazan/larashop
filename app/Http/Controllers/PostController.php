<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$limit = 5;
        $this->data['articles'] = Post::active()->limit($limit)->get();
	}
    
    public function index(Request $request)
	{
		$posts = Post::active();

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = '';
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($posts);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

		$this->data['posts'] = $posts->paginate(9);
		return $this->loadTheme('blogs.index', $this->data);
    }
    
    public function show($slug)
	{
		$post = Post::active()->where('slug', $slug)->first();

		if (!$post) {
			return redirect('blogs');
		}

		$this->data['post'] = $post;

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $post->title;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($post->id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

		return $this->loadTheme('blogs.detail', $this->data);
    }
    
    public function _generate_breadcrumbs_array($id) {
		$homepage_url = url('/');
		$breadcrumbs_array[$homepage_url] = 'Home';
		
		// get sub cat title
		$sub_cat_title = 'Blogs';
		// get sub cat url
		$sub_cat_url = url('blogs');
	
		$breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
		return $breadcrumbs_array;
	}
}
