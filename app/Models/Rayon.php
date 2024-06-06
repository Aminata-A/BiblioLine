<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rayon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'libelle',
        'partie'
    ];

    public function livres(): HasMany
    {
        return $this->hasMany(Livre::class);  // Correction ici
    }
}
