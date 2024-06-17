<!-- resources/views/venues/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Venue</h1>
        <form action="{{ route('venues.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Venue</button>
        </form>
    </div>
@endsection
