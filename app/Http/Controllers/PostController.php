<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\Categories;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post', compact('posts')); 
    }

    public function create(){
        $categories = Categories::all();
        return view('admin.post_create', compact('categories'));

    }

    public function store(Request $request) {

      $request->validate([
           'title' => 'required',
            'author' => 'required',
            'description' =>'required',
            'longtext' => 'required',
            'image' => ['required', 'image'],
            'category_id' => 'required'
        ]);
    
        $data = $request->all();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/storage/app/public/upload'), $imageName);
        $data['image'] = $imageName;

        Post::create($data);
        
        return redirect(url('/admin'));
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->back();
    }
    
    public function show(Post $post){
        
        return view('post.show', compact('post'));

    }
}
