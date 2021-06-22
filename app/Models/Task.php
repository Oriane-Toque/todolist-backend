<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {


    public function category()
    {
        // https://laravel.com/docs/7.x/eloquent-relationships
        return $this->belongsTo('App\Models\Category');
    }


}
