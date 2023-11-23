<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    use HasFactory;

    public function celliers()
    {
        return $this->belongsToMany(Cellier::class, 'cellier_bouteilles')
            ->withPivot('quantite');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
