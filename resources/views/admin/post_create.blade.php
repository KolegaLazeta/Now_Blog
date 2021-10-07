@extends('layouts.admin')
@section('main')

<div class="container">
    
    <form action="/admin" enctype="multipart/form-data" method="post">
        @csrf   

        <div class="row">
            
            <div class="col-8 offset-2">
                <div class="row">
                    <h2> Dodaj Objavu </h2>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Naslov Objave</label>
     
                    
                    <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" 
                    name="title" 
                   
                    value="{{ old('title') }}"  
                    autocomplete="title" autofocus>
    
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group row">
                    <label for="author" class="col-md-4 col-form-label">Autor</label>
    
                    
                    <input id="author" type="author" class="form-control @error('author') is-invalid @enderror" 
                    name="author" 
                   
                    value="{{ old('author') }}"  
                    autocomplete="author" autofocus>
    
                    @error('author')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Deskripcija</label>
    
                    
                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" 
                    name="description" 
                   
                    value="{{ old('description') }}"  
                    autocomplete="description" autofocus>
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group row">  
                    <label for="longtext" class="col-md-4 col-form-label">Tekst</label>
                    <input id="longtext" type="textarea" class="form-control @error('longtext') is-invalid @enderror" name="longtext" value="{{old('longtext')}}" autocomplete="longtext" autofocus>
                   

                        @error('longtext')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>


               <div class="row">
                <div class="col-9">
                    <label for="image" class="col-md-4 col-form-label">Slika objave</label>

                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        
                            <strong>{{ $message }}</strong>
                       
                    @enderror
                </div>
                

                <div class="col pt-2">
                    <label for="category_id">Izaberite kategoriju</label>

                   <select name="category_id" style="height:30px;" class="form-select @error('category_id') is-invalid @enderror">

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
                </div>
            </div>
               
                <div class="row pt-4">
                    <button class="btn" style="background-color: rgb(36, 127, 121); color:white">Add new post</button>
                </div>
            </div>
        </form>
</div>
@endsection