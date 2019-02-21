<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salades extends Model
{
    protected $fillable = ['libelle', 'description', 'prix', 'image'];
}
