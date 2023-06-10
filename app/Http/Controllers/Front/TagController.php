<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag_name){
        $all_data = Tag::where('tag_name', $tag_name)->get();
        $all_post_ids = [];
        foreach($all_data as $row) {
            $all_post_ids[] = $row->post_id;
        }
        $all_posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('front.tag',compact('all_posts', 'all_post_ids','tag_name'));
    }

}
