@extends('layouts.blog')

@section('main')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
     
             
                    @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="/post/{{$post->id}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{$post->description}}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            {{$post->author}}</a>
                            on {{$post->created_at}}
                        </p>
                    </div>
                    @endforeach
            
            
            <hr class="my-4" />

        </div>
    </div>
</div>
@endsection