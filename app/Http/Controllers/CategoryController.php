<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index' , compact('categories'));
    }

    public function create()
    {
        return view('categories.create');

    }

    public function store(Request $request)
    {
        // return $request; => // for test
        // 1 validation
        $this->validate($request , ["name" => "required"]);

        // 2 insert
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        // 3 redirect
        // return redirect()->route('categories');
        return redirect()->route('categories')->with('message' , 'Category Inserted Successfully');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        // return $category; // for test
        return view('categories.edit' , compact('category'));
    }

    public function update(Request $request, $id)
    {
        // 1 validation
        $this->validate($request, ["name" => "required"]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        // 3 redirect
        // return redirect()->route('categories');
        return redirect()->route('categories')->with('message', 'Category Updated Successfully');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        // 3 redirect
        // return redirect()->route('categories');
        return redirect()->route('categories')->with('message', 'Category Deleted Successfully');

    }
}
