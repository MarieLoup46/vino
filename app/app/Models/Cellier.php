<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cellier extends Model
{
    use HasFactory;
    protected $fillable = ["nom", "user_id"];

    public function bouteilles()
    {
        return $this->hasMany(CellierBouteille::class, 'cellier_id');
    }
    

}
