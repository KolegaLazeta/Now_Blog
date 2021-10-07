@extends('layouts.blog')
@section('title', 'Najnoviji Blogovi')
@section('main')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center d-flex">
        
        <div class="col-md-8 col-lg-8 col-xl-7">
            <!-- Post preview-->
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="/post/{{$post->id}}">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h3 class="post-subtitle">{{$post->description}}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    {{$post->author}}
                    on {{$post->created_at}}
                </p>
            </div>
            @endforeach
            <hr class="my-4" />
          
      
            <!-- Pager-->
       
        </div>
        
        <div class="col-md-2 offset-2 pt-4" style="overflow-y: scroll;  height:300px;">
            <h4 class="pl-5">Kategorije:</h4>
            @foreach($categories as $category)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="/categories/{{$category->id}}">{{$category->name}}</a>
                    </li>
                </ul>
                <hr >
            @endforeach
            <div class="category-view">

            </div>
        </div>
    </div>
</div>
@endsection
