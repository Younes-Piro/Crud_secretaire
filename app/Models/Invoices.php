<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'invoice_date',
        'invoice_amout_ttc',
        'invoice_amout_tva',
        'client_id'
    ];

    public function Client(){
        return $this->belongsTo(Client::class);
    }
    public function InvoiceLine(){
        return $this->hasMany(InvoiceLine::class);
    }
}
