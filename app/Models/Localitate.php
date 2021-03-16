<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localitate extends Model
{
    use HasFactory;
    protected $table='localitati';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'denumire',
        'judet_id'
    ];

    function judet()
    {
        return $this->belongsTo(Judet::class);
    }
}
