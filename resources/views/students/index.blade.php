@extends('layouts.master')

@section('content')
    <h2>List Students</h2>

    @if (\Session::has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> {{ \Session::get('msg') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    <a class="btn btn-dark " href="{{ route('students.create') }}">Add student</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">code</th>
        <th scope="col">date_of_birth</th>
        <th scope="col">img</th>
        <th scope="col">is_active</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->code}}</td>
        <td>{{$item->date_of_birth}}</td>
        <td><img src="{{Storage::url($item->img)}}" alt="" width="100px"></td>
        <td>{{$item->is_active}}</td>
        <td>
            <form action="{{route('students.destroy',$item->id)}}" method="post">
                @csrf
                @method('delete')
                <a href="{{route('students.edit',$item->id)}}" class="btn btn-primary ">Edit</a>
                <a href="{{route('students.show',$item->id)}}" class="btn btn-info">Show</a>
                <button class="btn btn-danger ">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
@endsection
