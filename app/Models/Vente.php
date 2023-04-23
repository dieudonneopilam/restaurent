<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use App\Models\User;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'qte_vente','prix_vente', 'user_id', 'date_vente','validate',];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
