<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model 
{

    protected $table = 'devis';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->hasOne('App\Customer');
    }

    public function provider()
    {
        return $this->hasOne('App\Provider');
    }

    public function service()
    {
        return $this->hasOne('App\Service');
    }

}