<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->latest('updated_at')->get();
        return view('owner.dashboard')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $validatedData = $request->validated();

        if (!$request->uuid) {
            $validatedData['uuid'] = Str::uuid();
        }

        $file = $request->file('vehicle_img');

        $destination = "storage/vehicle";

        $file->move($destination, $file->getClientOriginalName());

        $validatedData['vehicle_img'] = $file->getClientOriginalName();

        Vehicle::create($validatedData);

        return redirect()->route('vehicle.index')
            ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('owner.show', ['vehicle' => $vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('owner.edit', ['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validatedData = $request->validate([
            'vehicle_no' => 'required|string|max:255|',
            'vehicle_type' => 'required|string|max:100',
            'vehicle_status' => 'required|string|in:Active,Inactive',
            'person_count' => 'required|integer|min:1|max:50',
            'vehicle_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vehicle_charge' => 'required|numeric|min:0',
        ]);
        
        $vehicle->update([
            'vehicle_no' => $validatedData['vehicle_no'],
            'vehicle_type' => $validatedData['vehicle_type'],
            'vehicle_status' => $validatedData['vehicle_status'],
            'person_count' => $validatedData['person_count'],
            'vehicle_img' => $validatedData['vehicle_img']->getClientOriginalName(),
            'vehicle_charge' => $validatedData['vehicle_charge'],
        ]);

        $file = $request->file('vehicle_img');

        $destination = "storage/vehicle";

        $file->move($destination, $file->getClientOriginalName());

        return to_route('vehicle.show', $vehicle)->with('success', "Details updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return to_route('vehicle.index', $vehicle)->with('success', "Vehicle deleted Successfully");

    }
}
