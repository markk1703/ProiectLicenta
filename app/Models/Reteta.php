<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Followship;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Tags\HasTags;
use SortAndFilter;


class Reteta extends Model implements Searchable
{
    use Rateable;
    use HasFactory;
    use HasTags;
    
    protected $table='retete';
    public $timestamps = true;
    protected $fillable = [
        'utilizator_id',
        'denumire',
        'ingrediente',
        'mod_de_preparare',
        'categorii',
        'imagine_principala',
        'imagini',
        'rating_avg',
        'URL_video'
    ];

    function user()
    {
        return $this->belongsTo(User::class,'utilizator_id');
    }
    public function getSearchResult(): SearchResult{
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->denumire
         );
    }
}
