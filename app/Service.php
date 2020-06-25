<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Service extends Model {

    protected $table = 'services';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function category() {
        return $this->hasOne('Categoriesservice');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

}
