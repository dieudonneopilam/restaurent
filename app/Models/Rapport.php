<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_rapport',
        'vente_jour',
        'dette_jour',
        'user_id',
        'validate',
        'date_deleted',
        'deleted',
        'depense_jour',
        'dette_non_payer',
        'dette_payed',
        'vente_non_payer',
        'vente_payed',
        'achat_jour',
        ''
    ];

    public function caisse()
    {
        return $this->hasOne(Caisse::class);
    }
}
