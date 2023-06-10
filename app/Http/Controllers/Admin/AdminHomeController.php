<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
       $total_posts = Post::count();
       $total_photo = Photo::count();
       $total_category = Category::count();
       $total_sub_category = SubCategory::count();
       $total_tags = Tag::count();
        return view('admin.home', compact( 'total_posts', 'total_photo', 'total_category', 'total_sub_category', 'total_tags' ));
    }
}
