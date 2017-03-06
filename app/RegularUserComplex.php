<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegularUserComplex extends Model
{
  // Get RegularUser
  public function regular_user()
  {
    return $this->belongsTo('App\RegularUser');
  }

  // Get Complex
  public function complex()
  {
    return $this->belongsTo('App\Complex');
  }
}
