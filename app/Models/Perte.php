<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perte extends Model
{
    protected $fillable = [
        'produit_id',
        'date_perte',
        'qte_perdu',
        'prix_perdu',
        'person_perte',
        'deleted',
        'date_deleted'
    ];
    use HasFactory;

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
