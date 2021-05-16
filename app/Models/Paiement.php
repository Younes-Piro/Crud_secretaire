<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_paiement',
        'type_paiement',
        'client_id'
    ];

    public function Client(){
        return $this->belongsTo(Client::class);
    }
}
