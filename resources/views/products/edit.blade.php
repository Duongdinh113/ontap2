@extends('layouts.master')

@section('content')

<h2>Form update product</h2>
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
<form class="row" action="{{ route ('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for="name">name</label>
    <input class="form-control " type="text" name="name" id="" value="{{ $product->name }}">

    <label for="">price</label>
    <input class="form-control " type="number" name="price" id="" value="{{ $product->price }}">

    <label for="">price_sale</label>
    <input class="form-control " type="number" name="price_sale" id="" value="{{ $product->price_sale }}">

    <label for="">img</label>
    <input class="form-control " type="file" name="img" id="">
    <img style="width: 100px" src="{{ Storage::url($product->img) }}" alt="">

    <label for="">is_active</label>

   <div>
    <label for="">1</label>
    <input  type="radio" name="is_active" id=""
    @if ($product->is_active ==  App\Models\Product::isactive ) checked
    @endif
    value="{{ App\Models\Product::isactive }}">

    <label for="">0</label>
    <input  type="radio" name="is_active" id=""
    @if ($product->is_active ==  App\Models\Product::is_active ) checked
    @endif
    value="{{ App\Models\Product::is_active }}">
   </div>

    <label for="">describe</label>
    <textarea name="describe" id="" cols="30" rows="10">{{ $product->describe }}</textarea>

    <div class="mt-2">
        <a class="btn btn-info " href="{{ route('products.index') }}">Back</a>
        <button class="btn btn-success ">Submit</button>
    </div>

</form>
@endsection
