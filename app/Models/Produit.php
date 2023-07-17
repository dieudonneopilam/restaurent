<?php

namespace App\Models;

use App\Models\Dette;
use App\Models\Perte;
use App\Models\Vente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'file', 'designation', 'qte', 'deleted','date_deleted', 'stock_alerte', 'prix_vente', 'devise_prix','qte_init'
    ];

    public function achats()
    {
        return $this->hasMany(Achat::class);
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
    public function dettes()
    {
        return $this->hasMany(Dette::class);
    }
    public function depenses()
    {
        return $this->hasMany(Depenses::class);
    }
    public function pertes()
    {
        return $this->hasMany(Perte::class);
    }

}
