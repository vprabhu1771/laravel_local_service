<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created feedback in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $user = $request->user();
            
            // Validate the request data
            $request->validate([
                'name' => 'required|string',
                // 'student_id' => 'required|exists:users,id',
                // Add any other validation rules for your feedback fields
            ]);

            // Create a new feedback instance
            $feedback = Feedback::create([
                'name' => $request->input('name'),
                'user_id' => $user->id,
            ]);

            // You can customize the response as needed
            return response()->json(['message' => 'Feedback submitted successfully', 'data' => $feedback], 201);

        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
