<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  /**
   * The project that belong to the IMAGE.
   */
  public function project()
  {
      return $this->belongsTo('App\Project');
  }
    
}
