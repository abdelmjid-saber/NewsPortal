<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $posts_query = Post::query();
        $search_param = $request->query('search');
        if($search_param) {
            $posts_query = Post::search($search_param);
        }

        $post_data = $posts_query->get();
        return view('front.search', compact('post_data'));
    }
}
