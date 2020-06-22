<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model 
{

    protected $table = 'prestataires';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function devis()
    {
        return $this->hasMany('App\Devis');
    }

    public function ville()
    {
        return $this->hasOne('App\Ville');
    }

}