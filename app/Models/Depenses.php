<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'motif',
        'montant',
        'date_depense',
        'user_id',
        'deleted',
        'produit_id',
        'qte_achat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
