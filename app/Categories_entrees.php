<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories_entrees extends Model
{
    protected $fillable = ['libelle'];

    public function Entrees()
    {
        return $this->hasMany(Entrees::class);
    }
}
