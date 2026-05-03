<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return Property::with(['owner', 'images', 'amenities'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'owner_id' => 'required|exists:users,id',
            'title' => 'required',
            'total_rooms' => 'required|integer',
            'monthly_rent' => 'required|numeric',
        ]);

        return Property::create($data);
    }

    public function show($id)
    {
        return Property::with(['owner', 'images', 'amenities'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return $property;
    }

    public function destroy($id)
    {
        Property::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}