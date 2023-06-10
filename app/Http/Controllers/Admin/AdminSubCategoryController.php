<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminSubCategoryController extends Controller
{
    public function show() {
        $sub_categories = SubCategory::with('rCategory')->orderBy('sub_category_order', 'asc')->get();
        return view('admin.sub_category.sub_category_show', compact('sub_categories'));
    }

    public function create() {
        $categories = Category::orderBy('category_order', 'asc')->get();
        return view('admin.sub_category.sub_category_create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
            'sub_category_icon' => 'required'
        ]);

        $ext = $request->file('sub_category_icon')->extension();
        $final_name = 'sub_category_icon' . time() . '.' . $ext;
        $request->file('sub_category_icon')->move(public_path('uploads/icons'), $final_name);

        $sub_category = new SubCategory();
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->sub_category_icon = $final_name;
        $sub_category->show_on_menu = $request->show_on_menu;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->sub_category_order = $request->sub_category_order;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();
        return redirect()->route('admin_sub_category_show')->with('success','Data is create Successfully');
    }

    public function edit($id) {
        $categories = Category::orderBy('category_order', 'asc')->get();
        $sub_category_single = SubCategory::where('id', $id)->first();
        return view('admin.sub_category.sub_category_edit', compact('categories', 'sub_category_single'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);

        $sub_category_single = SubCategory::where('id', $id)->first();

        if($request->hasFile('sub_category_icon')) {
            $request->validate([
                'sub_category_icon' => 'required|image|mimes:jpg,jpeg,png,webp'
            ]);    
            $ext = $request->file('sub_category_icon')->extension();
            $final_name = 'sub_category_icon' . time() . '.' . $ext;
            $request->file('sub_category_icon')->move(public_path('uploads/icons'), $final_name);
            $sub_category_single->post_photo= $final_name;
        }

        $sub_category_single->sub_category_name = $request->sub_category_name;
        $sub_category_single->show_on_menu = $request->show_on_menu;
        $sub_category_single->show_on_home = $request->show_on_home;
        $sub_category_single->sub_category_order = $request->sub_category_order;
        $sub_category_single->category_id = $request->category_id;
        $sub_category_single->update();
        return redirect()->route('admin_sub_category_show')->with('success','Data is Update Successfully');
    }

    public function delete($id) {
        $category_single = SubCategory::where('id', $id)->first();
        $category_single->delete();
        return redirect()->route('admin_sub_category_show')->with('success','Data is Delete Successfully');
    }
    

} 
