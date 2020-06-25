<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = ['id'];
    
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

}
