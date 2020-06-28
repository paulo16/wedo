<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model 
{

    protected $table = 'paiements';
    public $timestamps = true;
    protected $guarded = ['id'];

}