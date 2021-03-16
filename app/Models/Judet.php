<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judet extends Model
{
    use HasFactory;
    protected $table='judete';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'denumire',
        'prescurtare'
    ];
    function localitate()
    {
        return $this->hasMany(Localitate::class);
    }
}
