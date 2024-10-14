<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class TendanceController extends Controller
{
    //
    public function index()
    {
        return view('frontend.tendance');
    }
}