<!-- resources/views/events/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th><a href="{{ Request::url() }}?sort=id&direction={{ $sortDirection == 'asc' ? 'desc' : 'asc' }}">ID</a></th>
                <th><a href="{{ Request::url() }}?sort=name&direction={{ $sortDirection == 'asc' ? 'desc' : 'asc' }}">Name</a></th>
                <th>Poster</th>
                <th><a href="{{ Request::url() }}?sort=event_date&direction={{ $sortDirection == 'asc' ? 'desc' : 'asc' }}">Event Date</a></th>
                <th><a href="{{ Request::url() }}?sort=venue_id&direction={{ $sortDirection == 'asc' ? 'desc' : 'asc' }}">Venue</a></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td><img src="{{ asset($event->poster_path) }}" alt="Poster" style="width: 100px;"></td>
                    <td>{{ $event->event_date }}</td>
                    <td>{{ $event->venue->name }}</td>
                    <td>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-info">View</a>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $events->links() }}
    </div>
@endsection
