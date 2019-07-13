<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarters extends Model
{
    protected $primaryKey = 'headquarters_id';
    public $timestamps = false;
    
    protected $fillable=[
        'headquarters_id',
        'name',
    ];

    public function branches(){
        return $this->hasMany('App\Branch');
    }
    
}
