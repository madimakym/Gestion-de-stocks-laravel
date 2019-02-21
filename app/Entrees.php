<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrees extends Model
{
    protected $fillable = ['libelle', 'description', 'prix'];

    public function categories_entrees()
    {
        $this->belongsTo(Categories_entrees::class);
    }
}
