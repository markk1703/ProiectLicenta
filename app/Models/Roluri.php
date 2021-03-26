<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roluri extends Model
{
    use HasFactory;
    protected $table='roluri';
    protected $fillable = [
        'denumire'
    ];

    function users()
    {
        return $this->hasMany(User::class);
    }
}
