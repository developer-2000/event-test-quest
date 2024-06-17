<!-- resources/views/events/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $event->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label">Poster</label>
                @if ($event->poster_path)
                    <img src="{{ asset($event->poster_path) }}" alt="Current Poster" style="max-width: 200px; margin-bottom: 10px;">
                @endif
                <input type="file" class="form-control" id="poster" name="poster" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', $event->event_date) }}" required>
            </div>
            <div class="mb-3">
                <label for="venue_id" class="form-label">Venue</label>
                <select class="form-control" id="venue_id" name="venue_id" required>
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}" {{ $event->venue_id == $venue->id ? 'selected' : '' }}>{{ $venue->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
