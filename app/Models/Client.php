<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'adresse',
        'sexe'
    ];

    public function Paiement(){
        return $this->hasMany(Paiement::class);
    }
    public function Invoice(){
        return $this->hasMany(Invoice::class);
    }
}
