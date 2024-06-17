@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Venues</h1>
        <a href="{{ route('venues.create') }}" class="btn btn-primary">Add Venue</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th><a href="{{ route('venues.index', ['sort' => 'id', 'direction' => $sortDirection === 'asc' && $sortBy === 'id' ? 'desc' : 'asc']) }}">ID</a></th>
                <th><a href="{{ route('venues.index', ['sort' => 'name', 'direction' => $sortDirection === 'asc' && $sortBy === 'name' ? 'desc' : 'asc']) }}">Name</a></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($venues as $venue)
                <tr>
                    <td>{{ $venue->id }}</td>
                    <td>{{ $venue->name }}</td>
                    <td>
                        <a href="{{ route('venues.show', $venue) }}" class="btn btn-info">View</a>
                        <a href="{{ route('venues.edit', $venue) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('venues.destroy', $venue) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $venues->links() }}
    </div>
@endsection
