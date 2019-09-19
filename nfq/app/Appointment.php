<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
