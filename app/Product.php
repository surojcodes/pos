<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function productcategory(){
        return $this->belongsTo(Productcategory::class);
    }
}