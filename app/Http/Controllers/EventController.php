<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sort', 'id');
        $sortDirection = $request->query('direction', 'asc');

        $events = Event::with('venue')
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('events.index', compact('events', 'sortBy', 'sortDirection'));
    }

    public function create()
    {
        $venues = Venue::all();
        return view('events.create', compact('venues'));
    }

    public function store(StoreEventRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('poster')) {
            $image = $request->file('poster');
            $imagePath = 'images/events/' . uniqid() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            if ($img->width() > 1200) {
                $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }
            $img->save(public_path($imagePath));
            $validatedData['poster_path'] = $imagePath;
        }

        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $venues = Venue::all();
        return view('events.edit', compact('event', 'venues'));
    }

    public function update(StoreEventRequest $request, Event $event)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('poster')) {
            $image = $request->file('poster');
            $imagePath = 'images/events/' . uniqid() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            if ($img->width() > 1200) {
                $img->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }
            $img->save(public_path($imagePath));
            $validatedData['poster_path'] = $imagePath;
        }

        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
