<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';
    public $timestamps = false;

    protected $fillable = [
        'order_detail_id',
        'product_id',
        'order_id',
        'product_quantity',
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
