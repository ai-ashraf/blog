<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('backend.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:blogs,slug',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', 
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5048',
        ]);
    
        // Create new blog post
        $blog = new Blog([
            'title'       => $validatedData['title'],
            'slug'        => $validatedData['slug'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'image'       =>  $this->uploadImage($request->file('image'))
        ]);

        $blog->save();

        return redirect()
            ->route('admin.blogs.index')
            ->withMessage('Created Successfully!');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::get();
        return view('backend.blogs.edit', compact('blog','categories'));
    }

    public function update(Request $request,Blog $blog)
    {
        $validatedData    = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:blogs,slug',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', 
            'image'       => 'image|mimes:jpeg,png,jpg,gif,webp|max:5048',
        ]);
        $data = [
            'title'       => $request->title,
            'slug'        => $request->slug,
            'category_id' => $request->category_id,
            'description' => $request->description
        ];
        if($request->hasFile('image')){
            $data['image'] = $this->uploadImage($request->file('image'));
        }
        $blog->update($data);

        return redirect()
            ->route('admin.blogs.index')
            ->withMessage('Updated Successfully!');
    }

    public function show(Blog $blog)
    {
        return view('backend.blogs.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()
            ->route('admin.blogs.index')
            ->withMessage('Deleted Successfully!');
    }

    public function uploadImage($file){
        $fileName = date('y-m-d').'-'.time().'.'.$file ->getClientOriginalExtension();
        $file->move(storage_path('app/public/blogs'), $fileName);
        return $fileName;
    }
}
