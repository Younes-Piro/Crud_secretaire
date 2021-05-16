<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'services_id',
        'invoice_id',
        'invoiceLine_discount',
        'invoiceLine_service_quantity',
        'invoiceLine_price_per_unit'
    ];
    public function Services(){
        return $this->belongsTo(Services::class);
    }
    public function Invoices(){
        return $this->belongsTo(Invoice::class);
    }
}
