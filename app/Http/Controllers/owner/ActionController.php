<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    /**
     * Handle action events (approve/reject) on trip details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionEvent(Request $request)
    {
        // Decode JSON data from request
        $userData = json_decode($request->trip_details);
        $tripDetails = json_decode($userData);

        // Find the trip by its UUID
        $trip = Trip::where('uuid', $tripDetails->trip_id)->first();

        // Handle approval action
        if ($request->action == "approved") {
            $trip->update([
                "status" => "approved"
            ]);

            // Delete notification associated with the action
            DB::table('notifications')->where('id', $request->notify_id)->delete();

            // Redirect to owner notifications route with success message
            return redirect()->route('owner.notifications')->with('success', 'Plan has been approved successfully');
        }
        
        // Handle rejection action
        if ($request->action == "rejected") {
            $trip->update([
                "status" => "rejected"
            ]);

            // Delete notification associated with the action
            DB::table('notifications')->where('id', $request->notify_id)->delete();

            // Redirect to owner notifications route with success message
            return redirect()->route('owner.notifications')->with('success', 'Plan has been rejected successfully');
        }

        // Handle any other actions or errors
        return redirect()->back()->with('error', 'Invalid action');
    }
}
