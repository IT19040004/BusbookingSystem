<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class super_admin extends Model
{
    use HasFactory;
    protected $table = 'super_admins';
    protected $fillable =[
        'name',
        'email',
        'password',
    ];
}