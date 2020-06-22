<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model 
{

    protected $table = 'payements';
    public $timestamps = true;
    protected $guarded = ['id'];

}