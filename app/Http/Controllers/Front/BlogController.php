<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $post_data = Post::orderBy('updated_at', 'desc')->paginate(10);
        $post_count = Post::get();
        return view('front.blog', compact('post_data','post_count'));
    }
}
