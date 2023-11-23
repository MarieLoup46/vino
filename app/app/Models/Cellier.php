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
        return $this->belongsToMany(Bouteille::class, 'cellier_bouteilles')
                    ->withPivot('quantite');
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($cellier) {
            // Delete related records in the `bouteille_cellier` table
            $cellier->bouteilles()->detach();
        });
    }

}
