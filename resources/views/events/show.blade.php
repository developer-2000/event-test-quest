<!-- resources/views/events/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Details</h1>
        <div class="card">
            <div class="card-header">{{ $event->name }}</div>
            <div class="card-body">
                <p><strong>Poster:</strong></p>
                <img src="{{ asset($event->poster_path) }}" alt="Poster" style="max-width: 200px; margin-bottom: 10px;">
                <p><strong>Event Date:</strong> {{ $event->event_date }}</p>
                <p><strong>Venue:</strong> {{ $event->venue->name }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
        </div>
    </div>
@endsection
