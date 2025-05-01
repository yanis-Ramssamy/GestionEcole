<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Classe extends Model
{
    use HasFactory;
    
    Public function  profs(): BelongsToMany{
        return $this->belongsToMany(Prof::class);}
}
