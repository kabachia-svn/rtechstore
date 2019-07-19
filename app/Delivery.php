<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $primaryKey = 'delivery_id';
    public $timestamps = false;

    protected $fillable=[
        'delivery_id',
        'delivery_date',
        'supplier_id',
    ];

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
    public function setEntryDateAttribute($input){
        $this->attributes['order_date']= Carbon::createFromFormat("yyyy-mm-dd", $input)->format('Y-m-d');
    }
}
