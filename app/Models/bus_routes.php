<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bus_routes extends Model
{
    use HasFactory;
    protected $table = 'bus_routes';
    protected $fillable =[
        'bus_id',
        'route_id',
        'status',
    ];
}
