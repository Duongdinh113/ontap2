@extends('layouts.master')

@section('content')
    <a href="{{ route('devices.create') }}">Add Device</a>
    @if (\Session::has('msg'))
        <div class="alert  alert-success ">
            {{ \Session::get('msg') }}
        </div>
    @endif


    <table class="table ">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">serial</th>
            <th scope="col">model</th>
            <th scope="col">img</th>
            <th scope="col">is_active</th>
            <th scope="col">describe</th>
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
        <tr>

                <td>{{ $item-> id}}</td>
                <td>{{ $item-> name}}</td>
                <td>{{ $item-> serial}}</td>
                <td>{{ $item-> model}}</td>
                <td><img src="{{ Storage::url($item-> img) }}" alt="" width="50px"></td>
                <td>{{ $item-> is_active}}</td>
                <td>{{ $item-> describe}}</td>
                <td>
                    <form  action="{{ route('devices.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info  " href="{{ route('devices.show', $item->id) }}">Show</a>
                        <a class="btn btn-primary   " href="{{ route('devices.edit', $item->id) }}">Edit</a>
                        <button class="btn btn-danger " onclick="return confirm('bạn có chắc muốn xóa không')">Delete</button>
                    </form>
                </td>


        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $data -> links() }}
@endsection
