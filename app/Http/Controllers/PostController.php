<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Categories;

class PostController extends Controller
{

    public function create(){
        $categories = Categories::all();
        $userId = Auth::id();
        return view('post.post_form', compact('categories', 'userId'));
    }

    public function store(Request $request) {

      $request->validate([
           'title' => 'required',
            'author' => 'required',
            'description' =>'required',
            'longtext' => 'required',
            'image' => ['required', 'image'],
            'category_id' => 'required',
        ]);
    
        $data = $request->all();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/storage/app/public/upload'), $imageName);
        $data['image'] = $imageName;
        $data['userId'] = Auth::id();

        Post::create($data);
        
        return redirect(url('/home'));
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect()->back();
    }
    
    public function show(Post $post){
        
        return view('post.show', compact('post'));

    }
}
