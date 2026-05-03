<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return Favorite::with(['user', 'property'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'property_id' => 'required|exists:properties,property_id',
        ]);

        return Favorite::create($data);
    }

    public function destroy($id)
    {
        Favorite::destroy($id);
        return response()->json(['message' => 'Removed']);
    }
}