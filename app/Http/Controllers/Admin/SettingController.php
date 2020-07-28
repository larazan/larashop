<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    //
    public function __construct()
	{
		parent::__construct();

		$this->data['currentAdminMenu'] = 'general';
		$this->data['currentAdminSubMenu'] = 'settings';

    }
    
    public function index() {
        $setting = Setting::find(1); 
        $this->data['system_name'] = $setting->value;
        return view('admin.settings.form', $this->data);
    }

    public function update(Request $request) {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $fav_settings = Setting::find(2);
        if ($request->file('favicon')) {
            @unlink(public_path('/others/'.$fav_settings->$value));
            $file = $request->file('favicon');
            $extension = $file->getClientOriginalExtension();
            $favicon = 'favicon.'.$extension;
            $file->move(public_path('/others'), $favicon);
            $fav_settings->value = $favicon;
            $fav_settings->save();

        }

        $front_settings = Setting::find(3);
        if ($request->file('front_logo')) {
            @unlink(public_path('/others/'.$front_settings->$value));
            $file = $request->file('front_logo');
            $extension = $file->getClientOriginalExtension();
            $front_logo = 'front_logo.'.$extension;
            $file->move(public_path('/others'), $front_logo);
            $front_settings->value = $front_logo;
            $front_settings->save();
            
        }

        $admin_settings = Setting::find(4);
        if ($request->file('admin_logo')) {
            @unlink(public_path('/others/'.$admin_settings->$value));
            $file = $request->file('admin_logo');
            $extension = $file->getClientOriginalExtension();
            $admin_logo = 'admin_logo.'.$extension;
            $file->move(public_path('/others'), $admin_logo);
            $admin_settings->value = $admin_logo;
            $admin_settings->save();
            
        }

        $sys_settings = Setting::find(1);
        $sys_settings->value = $request->name;
        $sys_settings->save();

        return redirect('admin/settings/');
    }
}
