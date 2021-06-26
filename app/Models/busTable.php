<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busTable extends Model
{
    use HasFactory;
    protected $table ='bus_tables';
    protected $fillable =[
        'name',
        'type',
        'vehical_number',
        
    ];
}
