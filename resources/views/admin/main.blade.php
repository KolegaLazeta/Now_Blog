@extends('layouts.admin')

@section('main')
<div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Ime</th>
                <th scope="col">E-mail</th>
                <th scope="col">Datum registracije</th>
                <th scope="col">Uloga</th>
                <th scope="col">Promeni ulogu</th>
                
            </tr>
        </thead>
        
        <tbody>
            @foreach($users as $user)
          <tr>
            <th scope="row"></th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->role}}</td>
            <td>

              <form action="{{route('user.update', $user)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                @if($user->role == 'user')

                  <input class="form-check-input" value="admin" name="role" type="hidden">
                    <button class="btn btn-primary" type="submit">Postavi kao Admina</button>
                  @endif  
              </form> 
          
            </td>
            <td>
              <form action="{{route('user.destroy',$user)}}" method="post">
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