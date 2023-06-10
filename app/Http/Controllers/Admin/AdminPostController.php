<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminPostController extends Controller
{
    public function show() {
        $posts = Post::with('rSubCategory.rCategory')->get();
        return view('admin.post.post_show', compact('posts'));
    }

    public function create() {
        $sub_categories = SubCategory::with('rCategory')->get(); 
        return view('admin.post.post_create', compact('sub_categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_photo' => 'required|image|mimes:jpg,jpeg,png,webp'
        ]);

        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo' . time() . '.' . $ext;
        $request->file('post_photo')->move(public_path('uploads/posts'), $final_name);

        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;
        $post = new Post();
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->excerpt = $request->excerpt;
        $post->post_detail = $request->post_detail;
        $post->post_photo= $final_name;
        $post->visitors = 1;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_comment = $request->is_comment;
        $post->save();


        $tags_array_new = [];
        $tags_array = explode(',',$request->tags);
        for($i=0; $i < count($tags_array); $i++) {
            $tags_array_new[] = trim($tags_array[$i]);
        }
        $tags_array_new = array_values(array_unique($tags_array_new));
        for($i=0; $i < count($tags_array_new); $i++) {
            $tag = new Tag();
            $tag->post_id = $ai_id;
            $tag->tag_name = trim($tags_array_new[$i]);
            $tag->save();
        }

        // Sending this post to subscribers
        if($request->subscriber_send_option == 1) {
            $subject = 'A new post is published';
            $message = "Hi, A new post is published into our website, Please go to see that post:<br>";
            $message = '<a target="_blank" href= "' . route('post/'. $request->ai_id) . '">' . $request->post_title . '</a> <br>';
            $message = $request->excerpt;
            $subscribers = Subscriber::where('status', 'Active')->get();
            foreach($subscribers as $row) {
                Mail::to($row->email)->send(new Websitemail($subject,$message));
            }
        }

        return redirect()->route('admin_post_show')->with('success','Data is create Successfully');
    }

    public function edit($id) {
        $sub_categories = SubCategory::with('rCategory')->get(); 
        $existing_tags = Tag::where('post_id', $id)->get(); 
        $post_single = Post::where('id', $id)->first();
        return view('admin.post.post_edit', compact('post_single', 'sub_categories', 'existing_tags'));
    }

    public function delete_tag($id) {
        $tag = Tag::where('id', $id)->first();
        $tag->delete();
        return redirect()->back()->with('success','Data is delete Successfully');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
        ]);

        $post = Post::where('id', $id)->first();

        if($request->hasFile('post_photo')) {
            $request->validate([
                'post_photo' => 'required|image|mimes:jpg,jpeg,png,webp'
            ]);    
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo' . time() . '.' . $ext;
            $request->file('post_photo')->move(public_path('uploads/posts'), $final_name);
            $post->post_photo= $final_name;
        }

        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->excerpt = $request->excerpt;
        $post->post_detail = $request->post_detail;
        $post->visitors = 1;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_comment = $request->is_comment;
        $post->update();
        
        if($request->tags != '') {
            $tags_array = explode(',',$request->tags);
            for($i=0; $i < count($tags_array); $i++) {
                $total = Tag::where('post_id', $id)->where('tag_name', trim($tags_array[$i]))->count();
                if(!$total){
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag_name = trim($tags_array[$i]);
                    $tag->save();
                }
            }
        }
        return redirect()->route('admin_post_show')->with('success','Data is Update Successfully');
    }

    public function delete($id) {
        $post = Post::where('id', $id)->first();
        $post->delete();
        Tag::where('post_id', $id)->delete();
        return redirect()->route('admin_post_show')->with('success','Data is Delete Successfully');
    }
}