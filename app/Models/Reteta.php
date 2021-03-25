<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reteta extends Model
{
    use HasFactory;
    protected $table='retete';
    public $timestamps = true;
    protected $fillable = [
        'denumire',
        'ingrediente',
        'mod_de_preparare',
        'categorii',
        'imagine_principala',
        'imagini',
        'URL_video',
        'utilizator_id'
    ];
    protected $casts = [
        'created_at'=>'datetime',
        'updated_at' => 'datetime'
    ];

    function ingrediente()
    {
        return $this->hasMany(Ingrediente::class);
    }
}
