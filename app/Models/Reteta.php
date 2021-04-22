<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Reteta extends Model
{
    use HasFactory;
    use Rateable;
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
        'rating_avg',
        'URL_video'
    ];

    function ingrediente()
    {
        return $this->hasMany(Ingrediente::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rating()
    {
    return $this->hasMany(Rating::class);
    }
}
