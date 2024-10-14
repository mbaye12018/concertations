<?php

namespace App\Http\Controllers;

use App\Models\EnqueteRegion;
use Illuminate\Http\Request;

class EnqueteRegionController extends Controller
{
    /**
     * Affiche une liste de toutes les enquêtes régionales.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $enquetes = EnqueteRegion::all();
        return view('enquete_region.index', compact('enquetes'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle enquête régionale.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('enquete_region.create');
    }

    /**
     * Stocke une nouvelle enquête régionale dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'region_id' => 'required|exists:regions,id',
            'department_id' => 'required|exists:departements,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'utilisateurs_id' => 'required|exists:utilisateurs,id',
            'name' => 'required|string|max:100',
            'contact' => 'required|string|max:100',
            'fonction' => 'required|string|max:15', 
            'service_quality' => 'nullable|string', 
            'service_point' => 'nullable|string', 
            'accessible' => 'nullable|string', 
            'obstacle' => 'nullable|string', 
            'service_long' => 'nullable|string', 
            'service_efficace' => 'nullable|string', 
            'service_modernise' => 'nullable|string', 
            'service_outils' => 'nullable|string', 
            'reformes' => 'nullable|string', 
            'ameliorer_services' => 'nullable|string',
            'transparence_responsabilite' => 'nullable|string',
            'accessibilite_services' => 'nullable|string',
            'simplification_procedures' => 'nullable|string',
            'coordination_services' => 'nullable|string',
            'technologies_numeriques' => 'nullable|string',
            'formation_agents' => 'nullable|string',
            'association_citoyens' => 'nullable|string',
            'outils_participation' => 'nullable|string',
            'additional_comments' => 'nullable|string',
        ]);

        EnqueteRegion::create($validatedData);
        return redirect()->route('enquete-region.index')->with('success', 'Enquête régionale créée avec succès.');
    }

    /**
     * Affiche les détails d'une enquête régionale spécifique.
     *
     * @param \App\Models\EnqueteRegion $enquete
     * @return \Illuminate\View\View
     */
    public function show(EnqueteRegion $enquete)
    {
        return view('enquete_region.show', compact('enquete'));
    }

    /**
     * Affiche le formulaire d'édition pour une enquête régionale spécifique.
     *
     * @param \App\Models\EnqueteRegion $enquete
     * @return \Illuminate\View\View
     */
    public function edit(EnqueteRegion $enquete)
    {
        return view('enquete_region.edit', compact('enquete'));
    }

    /**
     * Met à jour une enquête régionale spécifique dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EnqueteRegion $enquete
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, EnqueteRegion $enquete)
    {
        $validatedData = $request->validate([
            'region_id' => 'required|exists:regions,id',
            'department_id' => 'required|exists:departements,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'utilisateurs_id' => 'required|exists:utilisateurs,id',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:enquete_region,email,' . $enquete->id,
            'position' => 'nullable|string|max:255',
            'service_quality' => 'required|string',
            'service_feedback' => 'nullable|string',
            'reforms' => 'required|string',
            'citizen_involvement' => 'nullable|string',
            'additional_comments' => 'nullable|string',
        ]);

        $enquete->update($validatedData);
        return redirect()->route('enquete-region.index')->with('success', 'Enquête régionale mise à jour avec succès.');
    }

    /**
     * Supprime une enquête régionale spécifique de la base de données.
     *
     * @param \App\Models\EnqueteRegion $enquete
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(EnqueteRegion $enquete)
    {
        $enquete->delete();
        return redirect()->route('enquete-region.index')->with('success', 'Enquête régionale supprimée avec succès.');
    }
}
