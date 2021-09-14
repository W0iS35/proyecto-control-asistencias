<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'role',
        'email',
        'password',
    ];

    
    protected $dateFormat = "Y-d-m H:i:s";

    public function getCreatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }
 
     public function getUpdatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }

    /**
     * 
     * 
     * 
     * 
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
