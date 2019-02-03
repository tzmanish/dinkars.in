<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class featured extends Model
{
    protected $table = 'featured_images';
    public function project()
    {
    	return $this->belongsTo('App\project');
    }
}
