<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function todo(){
        return $this->belongsTo('App\Todo');
    }
}
