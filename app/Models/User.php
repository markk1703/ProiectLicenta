<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'nume',
        'prenume',
        'email',
        'password',
        'imagine',
        'idRol',
        'isActiv',
        'stamp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'=>'datetime',
        'stamp' => 'datetime'
    ];

    function socialProviders(){
        return $this->hasMany(SocialProvider::class);
    }
    function adrese()
    {
        return $this->hasMany(Adresa::class);
    }
    function retete()
    {
        return $this->hasMany(Reteta::class);
    }
}
