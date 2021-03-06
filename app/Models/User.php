<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'confirm',
        'company',
        'contact_face',
        'phone',
        'bin',
        'year',
        'requisites',
        'tenge_account',
        'usd_account'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function get_waypoints(){
        return $this->hasMany(Waypoint::class);
    }

    public function get_role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function get_orders(){
        return $this->belongsToMany(Waypoint::class, 'waypoint_user');
    }

    public function get_notifications(){
        return $this->hasMany(Notification::class);
    }
}
