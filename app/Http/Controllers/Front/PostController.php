<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function detail($id) {

        $tag_data = Tag::where('post_id', $id)->get();
        $post = Post::with('rSubCategory.rCategory')->where('id', $id)->first();
        // Update page view count
        $new_value = $post->visitors+1;
        $post->visitors = $new_value;
        $post->update();

        $related_post_array = Post::orderBy('id', 'desc')->where('sub_category_id', $post->sub_category_id)->paginate(3);

        return view('front.post', compact('post','tag_data', 'related_post_array'));
    }

    
}
