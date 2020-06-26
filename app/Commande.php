<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model {

    protected $table = 'commandes';
    public $timestamps = true;
    protected $guarded = ['id'];

}
