@extends('layouts.blog')

@section('main')
<div class="row-8  pb-5">

  
  <div class="row">
    @foreach($categories as $category)
    <div class="col-sm-4">

        <a href="/categories/{{$category->id}}">
        <div class="card">
          <div class="card-body">
            <img src="/storage/app/public/upload/{{$category->image}}" width="100" height="400" class="card-img-top" >
            <h5 class="card-title">{{$category->name}}</h5>
          </div>
        </div>
      </a>
      
      
    </div>
      @endforeach
    </div>
    

</div>
@endsection