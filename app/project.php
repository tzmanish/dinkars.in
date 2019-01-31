<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    /**
     * The types that belong to the project.
     */
    public function types()
    {
        return $this->belongsToMany('App\Type');
    }
}
