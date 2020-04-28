<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $guarded = [];

    public function criterion(){
        return $this->hasMany(Criterion::class);
    }

}
