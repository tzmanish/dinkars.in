<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    /**
     * The projects that belong to the type.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
}
