<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest;

use App\Models\Info;
use Str;
use Session;

class InfoController extends Controller
{
    public function __construct()
	{
		parent::__construct();

		$this->data['currentAdminMenu'] = 'general';
		$this->data['currentAdminSubMenu'] = 'infos';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['infos'] = Info::orderBy('id', 'ASC')->paginate(10);

		return view('admin.info.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['info'] = null;

		return view('admin.info.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['type']);

        if (Info::create($params)) {
			\Session::flash('success', 'Info has been created');
		} else {
			\Session::flash('error', 'Info could not be created');
		}

		return redirect('admin/infos');
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
        $info = Info::findOrFail($id);

		$this->data['info'] = $info;

		return view('admin.info.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['type']);

		$info = Info::findOrFail($id);
		if ($info->update($params)) {
			\Session::flash('success', 'Info has been updated.');
		}

		return redirect('admin/infos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info  = Info::findOrFail($id);

		if ($info->delete()) {
			\Session::flash('success', 'Info has been deleted');
		}

		return redirect('admin/infos');
    }
}
