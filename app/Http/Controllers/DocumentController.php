<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{

    public function index()
    {
        $documents = Document::paginate(5);
        //dd($documents);
        return response()->json($documents, 200);

    }

        public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:4048', // Validation du fichier
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {

            if (!$request->hasFile('file_path')) {
                \Log::error("Aucun fichier trouvé dans le champ 'file_path'");
                return response()->json(['errors' => ['file_path' => ['Le fichier est requis.']]], 422);
            }
        
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
