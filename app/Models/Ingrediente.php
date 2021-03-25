<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $table='ingrediente';
    public $timestamps=false;
    protected $fillable = [
        'denumire',
        'categorie',
        'unitateDeMasura',
    ];

    function reteta()
    {
        return $this->hasMany(Reteta::class);
    }
}
