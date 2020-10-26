<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $primarykey = 'sector_id';


    protected $fillable = [
        'sector_name',
        'url_sector_image',
        'user_id'
        

    ];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function categories()
{
    return $this->hasMany(Categorie::class);
}
}
