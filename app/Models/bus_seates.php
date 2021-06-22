<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bus_seates extends Model
{
    use HasFactory;
    protected $table = 'bus_seates';
    protected $fillable =[
        'bus_id',
        'seat_number',
        'price',
    ];
}
