<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'supplier_id';
    public $timestamps = false;

    protected $fillable=[
        'supplier_id',
        'name',
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
    public function deliveries(){
        return $this->hasMany('App\Delivery');
    }
}
