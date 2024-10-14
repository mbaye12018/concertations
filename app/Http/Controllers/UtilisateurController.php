<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
class UtilisateurController extends Controller
{

    
   
    public function create()
{
    $utilisateurs = Utilisateur::paginate(10);
    $utilisateurs = Utilisateur::all(); // Récupérer tous les utilisateurs
    return view('utilisateur.create', compact('utilisateurs')); // Passer la liste à la vue
}

    
    
public function store(Request $request)
{
    $request->validate([
        'prenom' => 'required|string|max:100',
        'nom' => 'nullable|string|max:100',
        'role' => 'string|max:100',
        'username' => 'required|string|max:100|unique:utilisateurs',
        'password' => 'required|string|min:6',
    ]);

    Utilisateur::create([
        'prenom' => $request->prenom,
        'nom' => $request->nom,
        'username' => $request->username,
        'role' => $request->role,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('utilisateur.create')->with('success', 'Utilisateur ajouté avec succès.');
}

        public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateur.create')->with('success', 'Utilisateur supprimé avec succès.');
    }

    
        public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateur.edit', compact('utilisateur'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'prenom' => 'required|string|max:100',
        'nom' => 'nullable|string|max:100',
        'role' => 'string|max:100',
        'username' => 'required|string|max:100|unique:utilisateurs,username,' . $id,
        'password' => 'nullable|string|min:6',
    ]);

    $utilisateur = Utilisateur::findOrFail($id);
    $utilisateur->prenom = $request->prenom;
    $utilisateur->nom = $request->nom;
    $utilisateur->role = $request->role;
    $utilisateur->username = $request->username;

    // Si un mot de passe est fourni, le hacher et l'attribuer
    if ($request->password) {
        $utilisateur->password = bcrypt($request->password);
    }

    $utilisateur->save();

    return redirect()->route('utilisateur.create')->with('success', 'Utilisateur modifié avec succès.');
}

}
