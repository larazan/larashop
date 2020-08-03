<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    public function show($slug)
	{
		$info = Info::where('slug', $slug)->first();

		if (!$info) {
			return redirect('/');
		}

		$this->data['info'] = $info;

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $info->type;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($info->id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

		return $this->loadTheme('info.index', $this->data);
    }
    
    public function _generate_breadcrumbs_array($id) {
		$homepage_url = url('/');
		$breadcrumbs_array[$homepage_url] = 'Home';
		
		// get sub cat title
		// $sub_cat_title = 'Blogs';
		// get sub cat url
		// $sub_cat_url = url('blogs');
	
		// $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
		return $breadcrumbs_array;
	}
}
