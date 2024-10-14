<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('frontend.login');
    }


    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required'], 
            'password' => ['required'], 
        ]);

      
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

          
            return $this->redirectUserByRole(Auth::user()->role);
        }

       
        return back()->withErrors([
            'username' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.', 
        ])->onlyInput('username'); 
    }

 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect('/login'); 
    }

  
    private function redirectUserByRole($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->intended('/admin/dashboard');
            case 'consultation':
                return redirect()->intended('/consultant/dashboard');
            case 'rapporteur':
                return redirect()->intended('/rapporteur/dashboard');
            default:
                return redirect()->intended('/home'); 
        }
    }
}
