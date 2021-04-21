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
        'utilizator_id',
        'denumire',
        'ingrediente',
        'mod_de_preparare',
        'categorii',
        'tags',
        'imagine_principala',
        'imagini',
        'URL_video'
    ];
    protected $casts = [
        'created_at'=>'datetime',
        'updated_at' => 'datetime'
    ];

    function ingrediente()
    {
        return $this->hasMany(Ingrediente::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
