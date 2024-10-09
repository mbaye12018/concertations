<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ObjectifController extends Controller
{
    //
    public function index()
    {
        return view('frontend.objectif');
    }
}