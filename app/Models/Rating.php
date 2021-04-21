<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table='ratings';
    protected $fillable=[
        'reteta_id',
        'user_id',
        'rating'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'=>'datetime',
        'updated_at'=>'datetime'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
    function reteta()
    {
        return $this->belongsTo(Reteta::class);
    }
}
