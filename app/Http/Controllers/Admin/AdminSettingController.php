<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index() {
        $setting_data = Setting::where('id',1)->first();
        return view('admin.setting.setting', compact('setting_data')); 
    }
    public function update(Request $request) {
        $setting = Setting::where('id', 1)->first();
        // Logo
        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpg,jpeg,png,webp'
            ]);
            
            $ext = $request->file('logo')->extension();
            $final_name = 'logo' . '.' . $ext;
            $request->file('logo')->move(public_path('uploads/'), $final_name);
            $setting->logo  = $final_name;
        }
        // Favicon
        if($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'required|image|mimes:jpg,jpeg,png,webp'
            ]);
            
            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon' . '.' . $ext;
            $request->file('favicon')->move(public_path('uploads/'), $final_name);
            $setting->favicon  = $final_name;
        }

        $setting->analytic_id = $request->analytic_id;
        $setting->analytic_status = $request->analytic_status;
        $setting->disqus_code = $request->disqus_code;
        // Home page
        // -- Categories
        $setting->title_categories = $request->title_categories;
        $setting->description_categories = $request->description_categories;

        // Newsliter
        if($request->hasFile('photo_newsletter')) {
            $request->validate([
                'photo_newsletter' => 'required|image|mimes:jpg,jpeg,png,webp'
            ]);
            
            $ext = $request->file('photo_newsletter')->extension();
            $final_name = 'photo_newsletter' . '.' . $ext;
            $request->file('photo_newsletter')->move(public_path('uploads/'), $final_name);
            $setting->photo_newsletter  = $final_name;
        }

        $setting->title_newsletter = $request->title_newsletter;
        $setting->description_newsletter = $request->description_newsletter;
        $setting->text_bottom_newsletter = $request->text_bottom_newsletter;
        $setting->update();

        return redirect()->route('admin_setting')->with('success', 'Data is updated successfully');
    }
}
