<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriesservice extends Model 
{

    protected $table = 'categoriesservices';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function services()
    {
        return $this->hasMany('App\Service');
    }

}