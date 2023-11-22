@extends('layouts.master')

@section('content')
    <h2>List car</h2>
    <form class="row" action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name">name</label>
        <input type="text" name="name" id="name">

        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand">

        <label for="img">Image</label>
        <input type="file" name="img" id="img">

        <label for="is_active">Is_active</label>

        <div>
        <label for="is_active">1</label>
        <input type="radio" name="is_active" id="is_active" value="{{ \App\Models\Car::one }}">

        <label for="">2</label>
        <input type="radio" name="is_active" id="is_active" value="{{ \App\Models\Car::two }}">
        </div>

        <label for="describe">Describe</label>
        <textarea name="describe" id="" cols="30" rows="10"></textarea>

        <div>
            <a class="btn btn-info" href="{{ route('cars.index') }}">Back</a>
            <button class="btn btn-success " type="submit">Submit</button>
        </div>
    </form>
@endsection
