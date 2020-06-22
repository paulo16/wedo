<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model 
{

    protected $table = 'services';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->hasOne('Categoriesservice');
    }

}