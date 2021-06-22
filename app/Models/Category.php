<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {


    public function task()
    {
        // https://laravel.com/docs/7.x/eloquent-relationships
        return $this->hasMany('App\Models\Task');
    }


}
