<?php

namespace App\Http\Controllers;

use App\Models\AdminAction;
use Illuminate\Http\Request;

class AdminActionController extends Controller
{
    public function index()
    {
        return AdminAction::with('admin')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'admin_id' => 'required|exists:users,id',
            'action_type' => 'required',
            'target_id' => 'required',
        ]);

        return AdminAction::create($data);
    }
}