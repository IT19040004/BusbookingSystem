<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bus_schedule_bookings extends Model
{
    use HasFactory;
    protected $table ='bus_schedule_bookings';
    protected $fillable =[
        'bus_seate_id',
        'user_id',
        'bus_schedule_id',
        'seat_number',
        'price',
        'status',
    ];
}
