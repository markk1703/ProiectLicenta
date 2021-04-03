<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValoriNutritionale extends Model
{
    use HasFactory;
    protected $table='valori_nutritionale';
    public $timestamps=true;
    protected $fillable = [
        'ingredient_id',
        'calorii',
        'grasimi',
        'grasimi saturate',
        'glucide',
        'proteine',
        'sare',
        'calciu'
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
    function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
