<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories',
        ]);
    
        
        $category = new Category([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
        ]);
        $category->save();
        return redirect()
            ->route('admin.categories.index')
            ->withMessage('Category Created Successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id); // Fetch the category by ID
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id); 

   
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $id,
        ]);

 
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->withMessage('Category Updated Successfully!');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id); 
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->withMessage('Category Deleted Successfully!');
    }
}
