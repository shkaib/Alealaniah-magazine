<?php

namespace App;

// Using external libraries
use Illuminate\Database\Eloquent\Model;
use App\Ads;

class customer extends Model
{
    // Ads Model has One-to-many relationship with Customer Model

    public function ads()
    {
        return $this->hasMany('Ads');
    }
}
