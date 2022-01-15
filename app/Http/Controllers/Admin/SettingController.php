<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use Session;

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
        $setting = Setting::findOrFail(1); 
        $this->data['system_name'] = $setting->name;
        $this->data['address'] = $setting->address;
        $this->data['phone'] = $setting->phone;
        $this->data['email'] = $setting->email;
        $this->data['info'] = $setting->info;
        $this->data['map'] = $setting->map;
        return view('admin.settings.form', $this->data);
    }

    public function update(Request $request) {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $setting = Setting::findOrFail(1);

        $params = $request->except('_token');
        $params['name'] = $params['name'];
        $params['email'] = $params['email'];
        $params['phone'] = $params['phone'];
        $params['address'] = $params['address'];
        $params['info'] = $params['info'];

        if ($setting->update($params)) {
            // var_dump($params);
            Session::flash('success', 'Setting has been Changed');
            // $request->session()->flash('success', 'Category has been saved!');
        } elseif (Setting::create($params)) {
            Session::flash('success', 'Setting has been Created');
        }
        return redirect('admin/settings');
        
        

        // $fav_settings = Setting::find(2);
        // if ($request->file('favicon')) {
        //     @unlink(public_path('/others/'.$fav_settings->$value));
        //     $file = $request->file('favicon');
        //     $extension = $file->getClientOriginalExtension();
        //     $favicon = 'favicon.'.$extension;
        //     $file->move(public_path('/others'), $favicon);
        //     $fav_settings->value = $favicon;
        //     $fav_settings->save();

        // }

        // $front_settings = Setting::find(3);
        // if ($request->file('front_logo')) {
        //     @unlink(public_path('/others/'.$front_settings->$value));
        //     $file = $request->file('front_logo');
        //     $extension = $file->getClientOriginalExtension();
        //     $front_logo = 'front_logo.'.$extension;
        //     $file->move(public_path('/others'), $front_logo);
        //     $front_settings->value = $front_logo;
        //     $front_settings->save();
            
        // }

        // $admin_settings = Setting::find(4);
        // if ($request->file('admin_logo')) {
        //     @unlink(public_path('/others/'.$admin_settings->$value));
        //     $file = $request->file('admin_logo');
        //     $extension = $file->getClientOriginalExtension();
        //     $admin_logo = 'admin_logo.'.$extension;
        //     $file->move(public_path('/others'), $admin_logo);
        //     $admin_settings->value = $admin_logo;
        //     $admin_settings->save();
            
        // }

        // $sys_settings = Setting::find(1);
        // $sys_settings->value = $request->name;
        // $sys_settings->save();

        return redirect('admin/settings/');
    }
}
