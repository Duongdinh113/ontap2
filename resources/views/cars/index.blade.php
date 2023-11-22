@extends('layouts.master')

@section('content')
    <h2>List car</h2>
    <a class="btn btn-dark " href="{{ route('cars.create') }}">Add car</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">brand</th>
        <th scope="col">img</th>
        <th scope="col">is_active</th>
        <th scope="col">describe</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->brand}}</td>
        <td><img src="{{Storage::url($item->img)}}" alt="" width="100px"></td>
        <td>{{$item->is_active}}</td>
        <td>{{$item->describe}}</td>
        <td>
            <form action="{{route('cars.destroy',$item->id)}}" method="post">
                @csrf
                @method('delete')
                <a href="{{route('cars.edit',$item->id)}}" class="btn btn-primary ">Edit</a>
                <a href="{{route('cars.show',$item->id)}}" class="btn btn-info">Show</a>
                <button class="btn btn-danger ">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
@endsection
