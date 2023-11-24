@extends('layouts.master')

@section('content')
<h2>Form update device</h2>
@if(\Session::has('msg'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong> {{ \Session::get('msg') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 @endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="row" action="{{ route ('devices.update',$device->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">name</label>
    <input class="form-control " type="text" name="name" id="" value="{{ $device->name }}">

    <label for="">serial</label>
    <input class="form-control " type="text" name="serial" id="" value="{{ $device->serial }}">

    <label for="">model</label>
    <input class="form-control " type="text" name="model" id="" value="{{ $device->model }}">

    <label for="">img</label>
    <input class="form-control " type="file" name="img" id="">
    <img style="width: 100px;" src="{{ Storage::url($device->img) }}" alt="" >

    <label for="">is_active</label>

   <div>
    <label for="">1</label>
    <input  type="radio" name="is_active" id=""
    @if ($device->is_active == App\Models\Device::isactive) checked
    @endif
    value="{{ App\Models\Device::isactive }}">

    <label for="">0</label>
    <input  type="radio" name="is_active" id=""
    @if ($device->is_active == App\Models\Device::is_active) checked
    @endif
    value="{{ App\Models\Device::is_active }}">
   </div>

    <label for="">describe</label>
    <textarea name="describe" id="" cols="30" rows="10"></textarea>

    <div class="mt-2">
        <a class="btn btn-info " href="{{ route('devices.index') }}">Back</a>
        <button class="btn btn-success ">Submit</button>
    </div>

</form>
@endsection
