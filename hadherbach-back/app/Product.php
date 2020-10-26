<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primarykey = 'product_id';

    protected $fillable = [
        'productRef',
        'productName',
        'productDesc',
        'url_product_image',
        'product_price',
        'product_fees',
        'productStock',
        'productColor',
        'productSize',
        'productWheight',
        'user_id',
        'categorie_id'

    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
