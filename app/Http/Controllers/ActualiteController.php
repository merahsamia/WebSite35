<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Actualite;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;



class ActualiteController extends Controller
{


    public function index()
    {
        $actualites = Actualite::with('images')->latest()->take(4)->get();

        return response()->json($actualites, 200);
    }

    
    public function actualites()
    {
        $actualites = Actualite::with('images')->latest()->paginate(3);

        return response()->json($actualites, 200);
    }

    public function show($id)
    {

        $actualite = Actualite::with('images')->find($id);


        if (!$actualite) {
            return response()->json(['error' => 'Actualite not found'], 404);
        }

        return response()->json($actualite, 200);

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
    

    

    

    public function destroy($id)
    {
        $actualite = Actualite::findOrFail($id);

        // Supprimer chaque image et son fichier associé du système de fichiers
        foreach ($actualite->images as $image) {
            // Construire le chemin complet du fichier image
            $imagePath = public_path('storage/' . $image->url);
            
            // Vérifier si le fichier existe avant de le supprimer
            if (file_exists($imagePath)) {
                // Supprimer le fichier du système de fichiers
                unlink($imagePath);
            }
            
            // Supprimer l'enregistrement de l'image de la base de données
            $image->delete();
        }

        // Supprimer l'actualité

        $actualite->delete();

        //return response()->json(null, 204);
        return response()->json(['message' => 'Actualité supprimée avec succès.'], 200);
    }

    public function update(Request $request, $id)
    {
        // Trouver l'actualité par ID
        $actualite = Actualite::find($id);
        if (!$actualite) {
            return response()->json(['error' => 'Actualite not found'], 404);
        }

        // Valider les données de la requête
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images' => 'sometimes|array', // Les images sont maintenant optionnelles
            'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Mettre à jour l'actualité
            $actualite->update($validator->validated());

            // Ajouter les nouvelles images uniquement si elles sont fournies
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $image = new Image;
                    $path = $imageFile->store('actualites', 'public');
                    $image->url = $path;
                    $image->actualite_id = $actualite->id;
                    $image->save();
                }
            }

            // Charger les relations d'images et retourner l'actualité mise à jour
            return response()->json($actualite->load('images'), 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
        }
    }


}
