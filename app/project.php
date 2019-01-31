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

    /**
     * Get the images for the project.
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
