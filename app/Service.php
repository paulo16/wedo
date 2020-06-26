<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Categoriesservice;
use App\Ville;
use App\HeureService;
use App\Offre;

class Service extends Model {

    protected $table = 'services';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Categoriesservice::class, 'categoriesservice_id');
    }

    public function ville() {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function heureservices() {
        return $this->hasMany(HeureService::class, 'service_id');
    }

    public function offres() {
        return $this->hasMany(Offre::class, 'service_id');
    }

}
