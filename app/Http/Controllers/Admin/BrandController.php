<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

use App\Models\Brand;

use Str;
use Session;

class BrandController extends Controller
{
    public function __construct() {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'catalog';
        $this->data['currentAdminSubMenu'] = 'brand';
        $this->data['statuses'] = Brand::STATUSES;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['brands'] = Brand::orderBy('name', 'DESC')->paginate(10);

        return view('admin.brands.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['brand'] = null;

		return view('admin.brands.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $image = $request->file('image');
        if ($image) {
            # code...
       
            $name = \Str::slug($params['name']) . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = Brand::UPLOAD_DIR. '/images';

            $filePath = $image->storeAs($folder . '/original', $fileName, 'public');

            $resizedImage = $this->_resizeImage($image, $fileName, $folder);

            $params['original'] = $filePath;
            $params['extra_large'] = $resizedImage['extra_large'];
            $params['small'] = $resizedImage['small'];
            $params['user_id'] = \Auth::user()->id;

            unset($params['image']);
        }

		if (Brand::create($params)) {
			\Session::flash('success', 'Brand has been created');
		} else {
			\Session::flash('error', 'Brand could not be created');
		}

		return redirect('admin/brands');
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
        $brand = Brand::findOrFail($id);

		$this->data['brand'] = $brand;

		return view('admin.brands.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $params = $request->except('_token');

		$brand = Brand::findOrFail($id);
		if ($brand->update($params)) {
			\Session::flash('success', 'Brand has been updated.');
		}

		return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand  = Brand::findOrFail($id);

		if ($brand->delete()) {
			\Session::flash('success', 'Brand has been deleted');
		}

		return redirect('admin/brands');
    }
}
