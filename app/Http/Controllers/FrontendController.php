<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $blogs      = Blog::latest()->paginate(5);
        return view('frontend.index', compact('blogs','categories'));
    }
    public function blogFilter($id)
    {
        $categories = Category::get();
        $blogs = Blog::where('category_id', $id)->latest()->paginate(10);
        return view('frontend.index', compact('blogs','categories'));
    }

    public function blogList() 
    {
        $categories = Category::get();
        $blogs    = Blog::latest()->paginate(5);
        return view('frontend.blog-list', compact('blogs','categories'));
    }

    public function blogDetails( $id)
    {
        // dd($id);
        $blog = Blog::find($id);
        return view('frontend.blog-detail', compact('blog'));
    }

    public function commentStore(Request $request, $id)
    {

        // Store the comment in the database
        $comment = new Comment();
        $comment->body    = $request->input('body');
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $id;
        $comment->save();

        // Redirect the user back to the previous page
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
