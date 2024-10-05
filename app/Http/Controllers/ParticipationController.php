<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Logique pour traiter les données (enregistrer dans la base de données, envoyer un email, etc.)

        return redirect()->route('participation.form')->with('success', 'Merci pour votre participation !');
    }
}
