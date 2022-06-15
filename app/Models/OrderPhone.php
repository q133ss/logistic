<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPhone extends Model
{
    use HasFactory;

    protected $fillable = ['waypoint_id', 'phone'];
}
