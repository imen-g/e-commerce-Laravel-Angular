<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $primarykey = 'livraison_id';

    protected $fillable = [
        'state',
        'begin_livraison',
        'end_livraison',
        'product_invoice_id' ,
        'provider_id'
        

    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
    public function product_inv()
    {
        return $this->hasOne('App\ProductInvoice');
    }
}
