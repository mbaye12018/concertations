<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('frontend.login'); // Path to your login view
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the request inputs
        $credentials = $request->validate([
            'username' => ['required'], // Username field
            'password' => ['required'], // Password field
        ]);

        // Attempt to authenticate the user using username
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate(); // Regenerate session to prevent fixation

            // Redirect user based on their role
            return $this->redirectUserByRole(Auth::user()->role);
        }

        // Return back with error if authentication fails
        return back()->withErrors([
            'username' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.', 
        ])->onlyInput('username'); 
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return redirect('/login'); // Redirect to login page
    }

    // Redirect user based on their role
    private function redirectUserByRole($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->intended('/admin/dashboard');
            case 'consultant':
                return redirect()->intended('/consultant/dashboard');
            case 'rapporteur':
                return redirect()->intended('/rapporteur/dashboard');
            default:
                return redirect()->intended('/home'); 
        }
    }
}
