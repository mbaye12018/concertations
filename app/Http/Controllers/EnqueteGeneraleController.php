<?php

namespace App\Http\Controllers;

use App\Models\EnqueteGenerale;
use Illuminate\Http\Request;

class EnqueteGeneraleController extends Controller
{
    public function create()
    {
        return view('enquete.create'); 
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'location' => 'required|string|max:100',
            'country' => 'nullable|string|max:100',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'phone' => 'required|string|max:15', 
            'email' => 'required|email',
            'position' => 'nullable|string|max:100',
            'service_quality' => 'nullable|string', 
            'service_feedback' => 'nullable|string',
            'reforms' => 'nullable|string',
            'citizen_involvement' => 'nullable|string',
            'additional_comments' => 'nullable|string',
        ]);

       
        EnqueteGenerale::create($request->all());

        // Redirection après l'enregistrement
        return redirect()->route('enquete.create')->with('success', 'Enquête soumise avec succès.');
    }
}