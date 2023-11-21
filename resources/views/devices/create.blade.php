@extends('layouts.master')

@section('content')

<h2>Form add device</h2>
@if (\Session::has('msg'))
    <div class="alert alert-success">{{ \Session::get('msg') }}</div>

@endif
<form class="row" action="{{ route ('devices.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">name</label>
    <input class="form-control " type="text" name="name" id="">

    <label for="">serial</label>
    <input class="form-control " type="text" name="serial" id="">

    <label for="">model</label>
    <input class="form-control " type="text" name="model" id="">

    <label for="">img</label>
    <input class="form-control " type="file" name="img" id="">

    <label for="">is_active</label>

   <div>
    <label for="">1</label>
    <input  type="radio" name="is_active" id="" value="{{ App\Models\Device::isactive }}">

    <label for="">0</label>
    <input  type="radio" name="is_active" id="" value="{{ App\Models\Device::is_active }}">
   </div>

    <label for="">describe</label>
    <textarea name="describe" id="" cols="30" rows="10"></textarea>

    <div class="mt-2">
        <a class="btn btn-info " href="{{ route('devices.index') }}">Back</a>
        <button class="btn btn-success ">Submit</button>
    </div>

</form>
@endsection
