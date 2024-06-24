<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AllVehicleListController extends Controller
{
    public function getAllVehicles(){
        $allVehicle = Vehicle::with('user')->get();
        return view('customer.all-vehicle')->with('vehicles',$allVehicle);
    }

    public function getVehicle($id){
        $vehicle = Vehicle::with('user')->where('uuid',$id)->first();
        return view('customer.show-vehicle')->with('vehicle',$vehicle);
    }
}
