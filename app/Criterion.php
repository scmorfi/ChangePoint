<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function demand(){
        return $this->belongsTo(Demand::class);
    }

}
