<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function actionEvent(Request $request)
    {
        if ($request->action == "approve") {
            $userData = json_decode($request->user_details, true);
            $tripDetails = json_decode($userData);
            dd($tripDetails);
        }
}

}