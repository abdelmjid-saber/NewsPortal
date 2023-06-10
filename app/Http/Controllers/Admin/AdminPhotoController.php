<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    public function show() {
        $photo = Photo::get();
        return view('admin.gallery.photo_show', compact('photo'));
    }

    public function create() {
        return view('admin.gallery.photo_create');
    }

    public function store(Request $request) {
        $request->validate([
            'caption' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp'
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = 'photo_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/gallery'), $final_name);
        
        $photo = new Photo();
        $photo->photo = $final_name;
        $photo->caption = $request->caption;
        $photo->save();
        return redirect()->route('admin_photo_show')->with('success','Data is create Successfully');
    }

    public function edit($id) {
        $photo = Photo::get();
        $photo_single = Photo::where('id', $id)->first();
        return view('admin.gallery.photo_edit', compact('photo', 'photo_single'));
    }


    public function update(Request $request, $id) {
        $request->validate([
            'caption' => 'required',
        ]);

        $photo_single = Photo::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,webp'
            ]);
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_' . time() . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/gallery'), $final_name);
            $photo_single->photo= $final_name;
        }

        $photo_single->caption = $request->caption;
        $photo_single->update();
        return redirect()->route('admin_photo_show')->with('success','Data is Update Successfully');
    }

    public function delete($id) {
        $photo_single = Photo::where('id', $id)->first();
        $photo_single->delete();
        return redirect()->route('admin_photo_show')->with('success','Data is Delete Successfully');
    }


}
