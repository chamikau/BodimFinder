<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::with(['property', 'user'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'property_id' => 'required|exists:properties,property_id',
            'finder_id' => 'required|exists:users,id',
            'requested_rooms' => 'required|integer',
        ]);

        $data['requested_at'] = now();

        return Reservation::create($data);
    }

    public function show($id)
    {
        return Reservation::with(['property', 'user'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return $reservation;
    }

    public function destroy($id)
    {
        Reservation::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}