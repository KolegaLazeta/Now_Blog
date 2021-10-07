@extends('layouts.admin')
@section('main')

<div class="container">
    
    <form action="/admin/create" enctype="multipart/form-data" method="post">
        @csrf   

        <div class="row">
            
            <div class="col-8 offset-2">
               
                <div class="row">
                    <h2> Dodaj kategoriju </h2>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Naziv Kategorije</label>
    
                    
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                   
                    value="{{ old('name') }}"  
                    autocomplete="name" autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="row">
                    <div class="col-9">
                        <label for="image" class="col-md-4 col-form-label">Slika Kategorije</label>
    
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                            
                                <strong>{{ $message }}</strong>
                           
                        @enderror
                    </div>
                    

                

                <div class="row pt-4">
                    <button class="btn" style="background-color: rgb(36, 127, 121); color:white" value="submit">Kreiraj kategoriju</button>
                </div>
            </div>
        </div>
    </form>

@endsection