<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adrese extends Model
{
    use HasFactory;
    protected $table='adrese';
    protected $fillable = [
        'user_id',
        'judet_id',
        'localitate_id'
    ];
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
