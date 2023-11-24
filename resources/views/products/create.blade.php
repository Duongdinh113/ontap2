@extends('layouts.master')

@section('content')

<h2>Form add product</h2>
@if (\Session::has('msg'))
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
<form class="row" action="{{ route ('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">name</label>
    <input class="form-control " type="text" name="name" id="">

    <label for="">price</label>
    <input class="form-control " type="text" name="price" id="">

    <label for="">price_sale</label>
    <input class="form-control " type="text" name="price_sale" id="">

    <label for="">img</label>
    <input class="form-control " type="file" name="img" id="">

    <label for="">is_active</label>

   <div>
    <label for="">1</label>
    <input  type="radio" name="is_active" id="" value="{{ App\Models\Product::isactive }}">

    <label for="">0</label>
    <input  type="radio" name="is_active" id="" value="{{ App\Models\Product::is_active }}">
   </div>

    <label for="">describe</label>
    <textarea name="describe" id="" cols="30" rows="10"></textarea>

    <div class="mt-2">
        <a class="btn btn-info " href="{{ route('products.index') }}">Back</a>
        <button class="btn btn-success ">Submit</button>
    </div>

</form>
@endsection
