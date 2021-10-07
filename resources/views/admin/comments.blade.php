@extends('layouts.admin')
@section('main')

<div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Korisnicko Ime</th>
                <th scope="col">E-mail</th>
                <th scope="col">Objava</th>
                <th scope="col">Komentar</th>
                
            </tr>
        </thead>
        
        <tbody>
            @foreach($comments as $comment)
          <tr>
            <th scope="row"></th>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->user->email}}</td>
            <td>{{$comment->post->title}}</td>
            <td>{{$comment->comment}}</td>
            <td>
              <form action="{{route('comment.destroy',$comment)}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger py-1 m-0 text-white" type="submit"><i
                          class="fas fa-trash    "></i></button>
              </form>
          </td>
        
          </tr>
          @endforeach
        </tbody>
      </table>
   

</div>

@endsection