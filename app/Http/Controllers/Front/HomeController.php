<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    
    public function index() {
        $post = Post::with('rSubCategory.rCategory')->orderBy('visitors', 'desc')->paginate(6);
        $sub_category_data = SubCategory::orderBy('sub_category_order', 'asc')->where('show_on_home', 'Show')->get();
        return view('front.home', compact('post', 'sub_category_data'));
    }
}
