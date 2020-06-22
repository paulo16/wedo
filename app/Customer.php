<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model 
{

    protected $table = 'customers';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function devis()
    {
        return $this->hasMany('App\Customer');
    }

    public function ville()
    {
        return $this->hasOne('App\Ville');
    }

}