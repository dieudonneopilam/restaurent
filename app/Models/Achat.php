<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'qte_achat',
        'date_achat',
        'prix_achat',
        'deleted',
        'date_deleted'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
