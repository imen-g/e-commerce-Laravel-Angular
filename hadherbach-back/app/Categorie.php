<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $primarykey = 'categorie_id';


    protected $fillable = [
        'category_name',
        'url_categorie_image',
        'user_id',
        'sector_id'
        

    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
    public function sectors()
{
    return $this->belongsTo(Sector::class);
}

public function products()
{
    return $this->hasMany(Product::class);
}


}
