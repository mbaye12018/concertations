<?php

namespace App\Http\Controllers;

use App\Models\AccesServicesPublics;
use Illuminate\Http\Request;

class AccesPublicsController extends Controller
{
    public function index()
    {
        // Retrieve the service data from the database
        $services = AccesServicesPublics::select('services_frequentes', 'accessibilite')->get();

        // Prepare the data for the chart
        $chartData = [];
        foreach ($services as $service) {
            $chartData[] = [
                'services' => $service->services_frequentes,
                'accessibility' => json_decode($service->accessibilite) // Assuming the data is JSON
            ];
        }

        // Return the view with the chart data
        return view('frontend.admin.acces_publics', compact('chartData'));
    }
}

