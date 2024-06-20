<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRegistrationRequest;
use Illuminate\Http\Request;
use App\Models\DriverRegistration;
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
        $userRegistration = DriverRegistration::where('user_id', Auth::id())->first(); // Use first() instead of get()

        if (!$userRegistration) {
            abort(404);
        }

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

        DriverRegistration::create($validatedData);

        return redirect()->route('registration.index')
            ->with('success', 'Driver registered successfully successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
