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

      

        return redirect()->route('participation.form')->with('success', 'Merci pour votre participation !');
    }
}
