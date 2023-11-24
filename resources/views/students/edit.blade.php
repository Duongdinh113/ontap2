@extends('layouts.master')

@section('content')
    <h2>UPDATE</h2>

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
    <form class="row" action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">name</label>
        <input type="text" name="name" id="name" value="{{ $student->name }}">

        <label for="code">code</label>
        <input type="text" name="code" id="code" value="{{ $student->code }}">


        <label for="date_of_birth">code</label>
        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $student->date_of_birth }}">

        <label for="img">date_of_birth</label>
        <input type="file" name="img" id="img">
        <img style="width: 100px" src="{{ Storage::url($student->img) }}" alt="">


        <label for="is_active">Is_active</label>

        <div>
        <label for="is_active">1</label>
        <input type="radio" name="is_active" id="is_active"
        @if ($student->is_active == \App\Models\Student::is_active) checked
        @endif
        value="{{ \App\Models\Student::is_active }}">

        <label for="">2</label>
        <input type="radio" name="is_active" id="is_active"
        @if ($student->is_active == \App\Models\Student::is_not_active) checked
        @endif
        value="{{ \App\Models\Student::is_not_active }}">
        </div>



        <div>
            <a class="btn btn-info" href="{{ route('students.index') }}">Back</a>
            <button class="btn btn-success " type="submit">Submit</button>
        </div>
    </form>
@endsection
