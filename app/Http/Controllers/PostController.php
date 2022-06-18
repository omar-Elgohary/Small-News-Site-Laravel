<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index' , compact('posts'));
    }

    public function create()
    {
        // $categories = Category::all();
        // return view('posts.create' , compact('categories'));

        return view('posts.create')->with('categories' , Category::all());
    }

    public function store(Request $request)
    {
        // return $request;  // for test
        // 1 validation
        $this->validate($request , [
            'title' => 'required | unique:posts,title,except,id',
            'image' => 'required | mimes:png,jpg,jpeg,svg',
        ]);

        // 2 upload image
        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $image->move('images' , $imageName);
        // return $request;  // for test

        // 3 store
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'cat_id' => $request->cat_id,
            'image' => "images/$imageName",
        ]);

        //4 redirect
        return redirect()->route('posts')->with('message' , 'Post Inserted Successfully');
    }

    public function show($id)
    {
        $post = Post::find($id);
        // return $post;  // for test
        return view('posts.details' , compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post' , $post)->with('categories' , Category::all());
    }

    public function update(Request $request, $id)
    {
        // return $request;  // for test
        // 1 validation
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required | mimes:png,jpg,jpeg,svg',
        ]);

        // 2 upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image->move('images', $imageName);
            $post->image = "images/$imageName";
        }else{
            $imageName = $post->image;
            $post->image = $post->image;
        }

        // 3 Update
            $post->title = $request->title;
            $post->content = $request->content;
            $post->cat_id = $request->cat_id;
            $post->save();

        return redirect()->route('posts')->with('message', 'Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts')->with('message' , 'Post Deleted Successfully');
    }
}
