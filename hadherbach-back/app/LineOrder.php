<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineOrder extends Model
{
    protected $primarykey = 'line_order_id';

    protected $fillable = [
        'line_order_discount',
        'product_qte',
        'user_id' ,
        'order_id' ,
        'product_id'

        

    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
