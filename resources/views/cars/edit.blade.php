@extends('layouts.master')

@section('content')
    <h2>List car</h2>
    <form class="row" action="{{ route('cars.update',$car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">name</label>
        <input type="text" name="name" id="name" value="{{ $car->name }}">

        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" value="{{ $car->brand }}">

        <label for="img">Image</label>
        <input type="file" name="img" id="img">
        <img src="{{ Storage::url($car->img) }}" alt="" style="width: 100px">

        <label for="is_active">Is_active</label>

        <div>
        <label for="is_active">1</label>
        <input type="radio" name="is_active" id="is_active"
        @if ($car->is_active == \App\Models\Car::one) checked
        @endif
        value="{{ \App\Models\Car::one }}">

        <label for="">2</label>
        <input type="radio" name="is_active" id="is_active"
        @if ($car->is_active == \App\Models\Car::two) checked
        @endif
        value="{{ \App\Models\Car::two }}">
        </div>

        <label for="describe">Describe</label>
        <textarea name="describe" id="" cols="30" rows="10">{{ $car->describe }}</textarea>

        <div>
            <a class="btn btn-info" href="{{ route('cars.index') }}">Back</a>
            <button class="btn btn-success " type="submit">Submit</button>
        </div>
    </form>
@endsection
