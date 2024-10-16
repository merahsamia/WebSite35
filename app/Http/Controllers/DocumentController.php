<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return response()->json($documents, 200);

    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validation du fichier
        'description' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
        // Sauvegarder le fichier dans public/documents
        $filePath = $request->file('file_path')->store('documents', 'public');

        // Création du document
        $document = new Document;
        $document->title = $request->title;
        $document->description = $request->description;
        $document->file_path = $filePath; 
        $document->save();

        return response()->json(['success' => 'Document uploaded successfully'], 201);

    } catch (\Exception $e) {
        return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
    }
}

}
