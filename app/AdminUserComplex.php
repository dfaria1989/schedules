<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUserComplex extends Model
{
  // Get AdminUser
  public function admin_user()
  {
    return $this->belongsTo('App\AdminUser');
  }

  // Get Complex
  public function complex()
  {
    return $this->belongsTo('App\Complex');
  }
}
