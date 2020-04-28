<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $guarded = [];

    public function demand(){
        return $this->belongsTo(Demand::class);
    }
}
