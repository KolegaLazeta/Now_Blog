<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Intervention\Image\Facades\Image;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index(){
        $categories = Categories::all()->sortBy('name');
        return view('admin.categories', compact('categories'));
    }

    public function create(){
       
        return view('admin.category_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);

        $data = $request->all();
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/storage/app/public/upload'), $imageName);
            $data['image'] = $imageName;

            Categories::create($data);
        
        return redirect(url('/admin'));
    }

    public function destroy(Categories $category){

        $category -> delete();
        return redirect()->back();
        
    }

    public function categories(){
        $categories = Categories::all()->sortBy('name');
        return view('categories.index', compact('categories'));
    }

    public function show(Categories $id){
        
        $categories = Categories::all();
 

        $posts = Post::where('category_id', ($id->id))->latest()->get();

        return view('categories.show' ,compact('posts', 'categories'));
         

    }
    
}
