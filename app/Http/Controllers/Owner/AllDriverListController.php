<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class AllDriverListController extends Controller
{
    public function getAllDrivers(){
        $allDrivers = Driver::all();
        return view('owner.all-driver')->with('drivers',$allDrivers);
    }
}