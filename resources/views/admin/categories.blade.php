@extends('layouts.admin')


@section('main')

<div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Ime Kategorije</th>
                <th scope="col">Datum Kreiranja</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($categories as $category)
          <tr>
            <th scope="row"></th>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at->format('d/m/Y')}}</td>
            <td>
              <form action="{{route('category.destroy',$category)}}" method="post">
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