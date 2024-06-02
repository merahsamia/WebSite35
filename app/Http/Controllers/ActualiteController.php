<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Actualite;
use App\Models\Image;


class ActualiteController extends Controller
{


    public function index()
    {
        $actualites = Actualite::with('images')->latest()->get();

        return response()->json($actualites, 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        try {
            // Création de l'actualité
            $actualite = new Actualite;
            $actualite->title = $request->title;
            $actualite->content = $request->content;
            $actualite->save();
    
            // Ajout des images
            foreach ($request->file('images') as $imageFile) {
                $image = new Image;
                $path = $imageFile->store('actualites', 'public');
                $image->url = $path;
                $image->actualite_id = $actualite->id;
                $image->save();
            }
    
            return response()->json($actualite->load('images'), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
        }
    }
    

    public function show($id)
    {

        $actualite = Actualite::with('images')->find($id);


        if (!$actualite) {
            return response()->json(['error' => 'Actualite not found'], 404);
        }

        return response()->json($actualite, 200);

    }

}
