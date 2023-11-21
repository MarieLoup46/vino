<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    use HasFactory;
    
    public function cellierBouteilles()
    {
        return $this->hasMany(CellierBouteille::class, 'bouteille_id');
    }
}
