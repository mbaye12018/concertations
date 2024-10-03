<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\templateButterfly;



route::get('/',[templateButterfly::class,'index']);

