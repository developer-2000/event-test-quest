<!-- resources/views/events/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Event</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="poster" class="form-label">Poster</label>
                <input type="file" class="form-control" id="poster" name="poster" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>
            <div class="mb-3">
                <label for="venue_id" class="form-label">Venue</label>
                <select class="form-control" id="venue_id" name="venue_id" required>
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>
@endsection
