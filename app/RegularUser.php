<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegularUser extends User
{
  // Get RegularUserComplexes where user is subscribed
  public function regular_user_complexes()
  {
    return $this->hasMany('App\RegularUserComplex');
  }

  // Get Complexes through RegularUserComplex model
  public function complexes()
  {
    return $this->hasManyThrough('App\Complex', 'App\RegularUserComplex');
  }
}
