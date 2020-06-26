<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model {

    protected $table = 'villes';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function services() {
        return $this->hasMany('App\Service');
    }

}
