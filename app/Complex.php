<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Complex extends Model
{
  // Get AdminUserComplexes
  public function admin_user_complexes()
  {
    return $this->hasMany('App\AdminUserComplex');
  }

  // Get RegularUserComplexes
  public function regular_user_complexes()
  {
    return $this->hasMany('App\RegularUserComplex');
  }

  // Get Complex Admin Users
  public function admin_users()
  {
    return $this->hasManyThrough('App\AdminUser', 'App\AdminUserComplex');
  }

  // Get Complex Regular Users UnApproved
  public function regular_users_unapproved()
  {
    $unapproved_users = $this->regular_user_complexes()
                             ->where('accepted_by_admin', false)
                             ->pluck('user_id');

    return App\RegularUser::whereIn('id', $unapproved_users)->get();
  }

  // Get Complex Regular Users Approved
  public function regular_users_approved()
  {
    $approved_users = $this->regular_user_complexes()
                           ->where('accepted_by_admin', true)
                           ->pluck('user_id');

    return App\RegularUser::whereIn('id', $unapproved_users)->get();
  }
}
