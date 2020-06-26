<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class HeureService extends Model {

    protected $table = 'service_heure';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

}
