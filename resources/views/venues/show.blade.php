<!-- resources/views/venues/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Venue Details</h1>
        <div class="card">
            <div class="card-header">{{ $venue->name }}</div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $venue->id }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('venues.index') }}" class="btn btn-secondary">Back to Venues</a>
        </div>
    </div>
@endsection
