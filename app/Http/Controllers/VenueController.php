<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVenueRequest;

class VenueController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sort', 'id');
        $sortDirection = $request->query('direction', 'asc');

        // Получаем список мест с сортировкой и пагинацией
        $venues = Venue::orderBy($sortBy, $sortDirection)->paginate(10);

        // Передаем данные в представление
        return view('venues.index', compact('venues', 'sortBy', 'sortDirection'));
    }

    public function create()
    {
        return view('venues.create');
    }

    public function store(StoreVenueRequest $request)
    {
        Venue::create($request->validated());
        return redirect()->route('venues.index')->with('success', 'Venue created successfully.');
    }

    public function show(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }

    public function edit(Venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    public function update(StoreVenueRequest $request, Venue $venue)
    {
        $venue->update($request->validated());
        return redirect()->route('venues.index')->with('success', 'Venue updated successfully.');
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('venues.index')->with('success', 'Venue deleted successfully.');
    }
}

