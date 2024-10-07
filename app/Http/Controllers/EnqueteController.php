<?php

namespace App\Http\Controllers;

use App\Models\EnqueteGenerale;
use Illuminate\Http\Request;

class EnqueteController extends Controller
{
    public function store(Request $request)
    {
        
        \Log::info('Données soumises : ', $request->all());

    
        $validatedData = $request->validate([
            'location' => 'required|string|max:100',
            'country' => 'nullable|string|max:100',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:enquetes_generales,email',
            'position' => 'nullable|string|max:100',
            'service_quality' => 'required|string',
            'service_feedback' => 'nullable|string',
            'reforms' => 'required|string',
            'citizen_involvement' => 'nullable|string',
            'additional_comments' => 'nullable|string',
        ]);

      
        EnqueteGenerale::create($validatedData);

        return redirect()->back()->with('success', 'Enquête soumise avec succès !');
    }
}
