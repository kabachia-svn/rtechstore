<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'order_date',
        'headquarters_id',
    ];
    
    public function headquarters(){
        return $this->belongsTo('App\Headquarters');
    }
    
    public function setEntryDateAttribute($input){
     $this->attributes['order_date']= Carbon::createFromFormat("yyyy-mm-dd", $input)->format('Y-m-d');
    }

 
}
