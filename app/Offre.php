<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model {

    protected $table = 'offres';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function service() {
        return $this->hasOne('App\Service');
    }

}
