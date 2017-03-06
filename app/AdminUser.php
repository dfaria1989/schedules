<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends User
{
  // Get AdminUserComplexes where user manages complexes
  public function admin_user_complexes()
  {
    return $this->hasMany('App\AdminUserComplex');
  }

  // Get Complexes through AdminUserComplex model
  public function complexes()
  {
    return $this->hasManyThrough('App\Complex', 'App\AdminUserComplex');
  }
}
