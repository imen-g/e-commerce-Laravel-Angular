<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primarykey = 'order_id';

    protected $fillable = [
        'orderDesc',
        'order_fees_total',
        'paiement_mode',
        'user_id'
        

    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function line_order()
    {
        return $this->hasOne('App\LineOrder');
    }

    public function products()
    {
        return $this->hasOne('App\ProductInvoice','foreign_key', 'order_id');
    }
}
