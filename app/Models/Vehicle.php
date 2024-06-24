<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vehicle extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'user_id',
        'uuid',
        'vehicle_no',
        'vehicle_type',
        'vehicle_img',
        'vehicle_status',
        'person_count',
        'vehicle_charge',
    ];

    public function getRouteKeyName()
    {
      return 'uuid';
    }

    public function user(){
      return $this->belongsTo(User::class,'user_id');
  }
}