<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discusstion extends Model
{
    //
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
