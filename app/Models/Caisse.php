<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    use HasFactory;

    protected $fillable = [
        'argent_entree',
        'argent_banque',
        'argent_chef',
        'argent_caisse',
        'depenser',
        'motif_depense',
        'date_rapport',
        'rapport_id'
    ];

    public function rapport()
    {
        return $this->belongsTo(Rapport::class);
    }
}
