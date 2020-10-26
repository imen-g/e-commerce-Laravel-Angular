<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{
    protected $primarykey = 'product_invoice_id';

    protected $fillable = [
        'state',
        'product_invoice_discount',
        'product_invoice_tva',
        'product_invoice_total' ,
        'order_id' ,
        'user_id'
        

    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function order()
    {
        return $this->hasOne(App\Order::class,'foreign_key', 'order_id');
    }
}
