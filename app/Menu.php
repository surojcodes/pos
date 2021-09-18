<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded=[];
    public function menucategory(){
        return $this->belongsTo(Menucategory::class);
    }
}
