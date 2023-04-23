<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vente;
use App\Models\Dette;

class Produit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'file', 'designation', 'qte', 'deleted','date_deleted', 'stock_alerte'
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

}
