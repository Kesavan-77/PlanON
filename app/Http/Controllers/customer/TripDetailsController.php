<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripDetailsRequest;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TripDetailsController extends Controller
{

    public function index($vehicle){
        $vehicle = Vehicle::where('uuid',$vehicle)->get();
        return view('customer.dashboard')->with('vehicle',$vehicle);
    }

    public function store(StoreTripDetailsRequest $request)
    {
        $validated = $request->validated();
        $proofPath = null;

        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proofs', 'public');
        }

        Trip::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'vehicle_id' => $validated['vehicle_id'],
            'from_date' => $validated['from-date'],
            'to_date' => $validated['to-date'],
            'from_location' => $validated['from-location'],
            'to_locations' => json_encode($request->input('to-location', [])),
            'vehicle_no' => $validated['vehicle_no'],
            'driver' => $validated['driver'],
            'proof_image' => $proofPath,
            'trip_description' => $validated['trip-description'],
        ]);

        return redirect()->route('allVehicles')->with('success', 'Your trip application has been submitted successfully. You will receive your status soon!');
    }

    public function yourTripPlans(){

        $getPlans = Trip::where('user_id',Auth::id())->get();
        return view('customer.your-plans')->with('plans',$getPlans);
    }
}