<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    public $timestamps = false;

    protected $fillable=[
        'product_id',
        'name',
        'supplier_id',
        'order_id',
    ];

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
    public function order(){
        return $this->hasOne('App\Order');
    }
}
