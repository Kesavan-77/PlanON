<?php

namespace App\Models;

use App\Notifications\UserFollowNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Trip extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'uuid', 'user_id', 'vehicle_id', 'from_date', 'to_date',
        'from_location', 'to_locations', 'vehicle_no',
        'driver', 'proof_image', 'trip_description'
    ];

    protected $casts = [
        'to_locations' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($trip) {
            $vehicle = $trip->vehicle->user_id;
            $user = User::find($vehicle);
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $message = [
                'trip_id' => $trip['id'],
                'proof_image'=> $trip['proof_image'],
                'from_location' => $trip['from_location'],
                'to_locations' => $trip['to_locations'],
                'from_date' => $trip['from_date'],
                'to_date' => $trip['to_date'],
                'vehicle_no' => $trip['vehicle_no'],
                'driver' => $trip['driver'],
                'trip_description' => $trip['trip_description']
            ];
            
            $message = json_encode($message);

            if ($user) {
                $user->notify(new UserFollowNotification($userId, $userName, $message));
            } else {
                \Log::warning('Vehicle not found for Trip ID: ' . $trip->id);
            }
        });
    }
}
