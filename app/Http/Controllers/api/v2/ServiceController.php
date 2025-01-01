<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

use App\Models\User;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');

        if (!$categoryId) {
            // If category_id is not provided, return a 404 response
            return response()->json(['error' => 'Category ID is required'], 404);
        }

        $services = Service::where('category_id', $categoryId)->get();

        return response()->json(['data' => $services], 200);
    }


    // Retrieve services offered by providers with the role 'provider'
    public function filterByServiceProvider(Request $request)
    {
        $serviceId = $request->input('service_id');

        if (!$serviceId) {
            // If service_id is not provided, return a 404 response
            return response()->json(['error' => 'Service ID is required'], 404);
        }

        // // Assuming you want to filter by service ID instead of category ID
        $services = Service::byServiceProviderRole('Service Provider')
                        ->with('serviceProvider') // Eager load the serviceProvider relationship
                        ->where('id', $serviceId)
                        ->get();

        // return response()->json(['data' => $services], 200);

        // Extract service providers from the services collection
        $serviceProviders = $services->pluck('serviceProvider')->unique();

        // // Transform service provider data if needed
        $transformedData = $serviceProviders->map(function ($provider) {
            return [
                'id' => $provider->id,
                'name' => $provider->name,
                'email' => $provider->email,
                'avatar' => $provider->avatar,
                'image_path' => $provider->image_path,
                'phone' => $provider->phone,
                'service_status' => $provider->service_status,                
            ];
        });

        return response()->json(['data' => $transformedData], 200);
    }
    
    
}
