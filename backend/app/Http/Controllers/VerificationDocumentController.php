<?php

namespace App\Http\Controllers;

use App\Models\VerificationDocument;
use Illuminate\Http\Request;

class VerificationDocumentController extends Controller
{
    public function index()
    {
        return VerificationDocument::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'document_type' => 'required',
            'document_url' => 'required',
        ]);

        return VerificationDocument::create($data);
    }

    public function update(Request $request, $id)
    {
        $doc = VerificationDocument::findOrFail($id);
        $doc->update($request->all());

        return $doc;
    }
}