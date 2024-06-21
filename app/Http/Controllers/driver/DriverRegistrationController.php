<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRegistrationRequest;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DriverRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRegistration = Driver::where('user_id', Auth::id())->first();

        return view('driver.dashboard')->with('driver', $userRegistration);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRegistrationRequest $request)
    {
        $validatedData = $request->validated();

        if (!$request->uuid) {
            $validatedData['uuid'] = Str::uuid();
        }

        $file = $request->file('driver_license');

        $destination = "storage/driver";

        $file->move($destination, $file->getClientOriginalName());

        $validatedData['driver_license'] = $file->getClientOriginalName();

        Driver::create($validatedData);

        return redirect()->route('registration.index')
            ->with('success', 'Driver registered successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRegistrationRequest $request, $id)
    {

        $driver = Driver::find($id);

        $validatedData = $request->validated();

        $driver->update([
            'driver_name' => $validatedData['driver_name'],
            'driver_ph_number' => $validatedData['driver_ph_number'],
            'driver_experience' => $validatedData['driver_experience'],
            'driver_charge' => $validatedData['driver_charge'],
            'driver_age' => $validatedData['driver_age'],
            'driver_gender' => $validatedData['driver_gender'],
            'driver_license' => $validatedData['driver_license']->getClientOriginalName(),
            'vehicle_type' => $validatedData['vehicle_type'],
        ]);

        $file = $request->file('driver_license');

        $destination = "storage/driver";

        $file->move($destination, $file->getClientOriginalName());

        return redirect()->route('registration.index', $driver->id)->with('success', 'profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect()->route('registration.index', $driver->id)->with('success', 'profile deleted successfully');
    }
}
