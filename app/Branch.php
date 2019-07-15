<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $primaryKey = 'branch_id';
    public $timestamps = false;
    
    protected $fillable = [
        'branch_id',
        'name',
        'headquarters_id',
    ];

    public function headquarters(){
        return $this->belongsTo('App\Headquarters');
    }

    
}
