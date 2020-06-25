<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = ['id'];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
