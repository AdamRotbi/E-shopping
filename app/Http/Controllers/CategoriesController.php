<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    
     public function index()
    {
        $categories = Category::all();
        
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        // Category::create($validatedData);

        return redirect()->route('categories')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }




    
    public function update(Request $request, $id)
    {
        
        // dd($request->all()); // Add this line to check the request data

        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories')->with('success', 'Category updated successfully');
    }


    
    public function destroy($id)    
    {
    
        $category = category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories')->with('success', 'Category deleted successfully');
    }
}