<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Appointement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Get doctor info by ID
    public function showDoctor($id)
    {
        $doctor = User::where('role', 'doctor')->find($id);

        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }

        return response()->json(['doctor' => $doctor], 200);
    }

    // Book an appointment
    public function store(Request $request, $doctorId)
    {
        $request->validate([
            "phone" => ['required', 'numeric']
        ]);
    
        $doctor = User::where('role', 'doctor')->find($doctorId);
    
        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }
    
        $user = auth()->user();
    
        $appointment = new Appointement();
        $appointment->name = $user->name;
        $appointment->email = $user->email;
        $appointment->phone = $request->phone;
        $appointment->doctor_id = $doctor->id;
        $appointment->patient_id = $user->id;
    
        $appointment->save();
    
        return response()->json([
            'message' => 'Your appointment has been booked successfully',
            'appointment' => $appointment
        ], 201);
    }
    
    
    public function myAppointments()
    {
        $appointments = Appointement::where('patient_id', Auth::id())->get();

        return response()->json(['appointments' => $appointments], 200);
    }
}
