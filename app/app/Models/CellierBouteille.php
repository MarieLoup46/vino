<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellierBouteille extends Model
{
    use HasFactory;
    protected $table = 'cellier_bouteilles';

    public function cellier()
    {
        return $this->belongsTo(Cellier::class, 'cellier_id');
    }

    public function bouteille()
    {
        return $this->belongsTo(Bouteille::class, 'bouteille_id');
    }


}
