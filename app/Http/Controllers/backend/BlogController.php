<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;



class BlogController extends Controller
{
    //
    function all_blog_category()
    {
        $bal = BlogCategory::all();
        return view('admin.blogcategory.all_cat', compact('bal'));
    }

    function store_blog_category(Request $request)
    {
        BlogCategory::insert([
            'cat_name' => $request->cat_name,
            'cat_slug' => strtolower(str_replace(' ', '-', $request->cat_name)),
        ]);
        return redirect()->route('all.blog.category');
    }
    function delete_blog_category($id)
    {
        BlogCategory::find($id)->delete();
        return back();
    }
    function edit_blog_category($id)
    {
        $cat = BlogCategory::find($id);
        return response()->json($cat);
    }
    function update_blog_category(Request $request)
    {
        $id = $request->cat_id;
        BlogCategory::find($id)->update([
            'cat_name' => $request->cat_name,
            'cat_slug' => strtolower(str_replace(' ', '-', $request->cat_name)),
        ]);
        return redirect()->route('all.blog.category');
    }




    //+++++++++++++++++++++++ Blog Post ++++++++++++++++++++++++

    function all_blog_post()
    {
        $blog = Blog::all();
        return view('admin.blog.all_blog', compact('blog'));
    }
    function add_blog_post()
    {
        $blog = BlogCategory::all();
        return view('admin.blog.add_blog', compact('blog'));
    }

    function store_blog_post(Request $request)
    {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(770, 520)->save(public_path('upload/blog/' . $name_gen));
        $save_url = 'upload/blog/' . $name_gen;

        $user_id = Auth::user()->id;

        $data = new Blog();
        $data->title = $request->title;
        $data->slug = strtolower(str_replace(' ', '-', $request->title));
        $data->user_id = $user_id;
        $data->cat_id = $request->cat_id;
        $data->short_des = $request->short_des;
        $data->long_des = $request->long_des;
        $data->tag = $request->tag;
        $data->image = $save_url;


        $data->save();

        $notification = array(
            'message' => 'New Blog Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function edit_blog_post($id)
    {
        $cat = BlogCategory::all();
        $blog = Blog::find($id);
        return view('admin.blog.edit_blog', compact('blog', 'cat'));
    }

    function update_blog_post($id, Request $request)
    {
        $data = Blog::find($id);

        if ($image = $request->file('image')) {
            if ($data->image  && file_exists(public_path($data->image))) {
                @unlink(public_path($data->image)); // Ensure the path is correct
            }
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 520)->save(public_path('upload/blog/' . $name_gen));
            $save_url = 'upload/blog/' . $name_gen;
            $data->image = $save_url;
        }

        $user_id = Auth::user()->id;


        $data->title = $request->title;
        $data->slug = strtolower(str_replace(' ', '-', $request->title));
        $data->user_id = $user_id;
        $data->cat_id = $request->cat_id;
        $data->short_des = $request->short_des;
        $data->long_des = $request->long_des;
        $data->tag = $request->tag;



        $data->update();

        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notification);
    }

    function delete_blog_post($id)
    {

        $blog = Blog::find($id)->delete();
        return back();
    }

    //+++++++++++++++++++++++ Blog Details +++++++++++++++++++++++++++
    function blog_details($slug)
    {

        $blog = Blog::where('slug', $slug)->first();
        $tag = $blog->tag;
        $tags = explode(',', $tag);
        $all_cat = BlogCategory::all();


        return view('frontend.blog.blog_details', compact('blog', 'tags', 'all_cat'));
    }


    function category_details($id)
    {

        $blogs = Blog::where('cat_id', $id)->get();




        return view('frontend.blog.category_details', compact('blogs'));
    }

    //comment
    public function StoreComment(Request $request)
    {
        $pid = $request->post_id;
        Comment::insert([
            'user_id' => Auth::user()->id,
            'post_id' => $pid,
            'parent_id' => null,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Comment Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // End Method



    public function AdminBlogComment()
    {
        $comment = Comment::where('parent_id', null)->latest()->get();
        return view('admin.blogComment.all_comment', compact('comment'));
    }

    public function AdminCommentReply($id)
    {
        $comment = Comment::where('id', $id)->first();
        return view('admin.blogComment.reply_comment', compact('comment'));
    } // End Method
    public function ReplyMessage(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        $post_id = $request->post_id;
        Comment::insert([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'parent_id' => $id,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Reply Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //
}
