<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Produit;

class Dette extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'qte_dette',
        'prix_vente',
        'devise_prix',
        'dette_name',
        'date_dette',
        'name_dette',
        'user_id',
        'deleted',
        'date_deleted',
        'payed'
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
