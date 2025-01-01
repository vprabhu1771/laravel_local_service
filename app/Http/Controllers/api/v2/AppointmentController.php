<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

use App\Enums\AppointmentStatus;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = $request->user();

            $request->validate([
                'customer_id' => 'required|exists:users,id',
                'service_provider_id' => 'required|exists:users,id',
                'appointment_date' => 'required|date',
                // 'appointment_time' => 'required|date_format:H:i A',
                'appointment_time' => 'required|date_format:H:i',
            ]);

            // $appointment = Appointment::create([
            //     'customer_id' => $request->customer_id,
            //     'service_provider_id' => $request->service_provider_id,
            //     'appointment_date' => $request->appointment_date,
            //     'appointment_time' => $request->appointment_time,
            //     'status' => AppointmentStatus::Scheduled,
            // ]);

            // Convert appointment_time to 24-hour format
            $appointmentTime = date('H:i', strtotime($request->appointment_time));

            $appointment = Appointment::create([
                'customer_id' => $user->id,
                'service_provider_id' => $request->service_provider_id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $appointmentTime, // Use the converted 24-hour format
                'status' => AppointmentStatus::Scheduled,
            ]);

            return response()->json("Successfully Appointment Book", 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }    
}
