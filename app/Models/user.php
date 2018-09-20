<?php

namespace billiard\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use billiard\Constants\Constants;
use billiard\Traits\Helper as BilliardHelpers;
class user extends Authenticatable
{
    use Notifiable,HasRoles,BilliardHelpers;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** General user relationships and functions **/
    public function setEmailAttribute($value) {
      $this->attributes['email'] = strtolower($value);
   }

   public function setPasswordAttribute($value) {
       $this->attributes['password'] = bcrypt($value);
   }

   public function getName()
   {
       return title_case($this->fullname);
   }

   public function getUserDetails()
   {
       $details = [];
       foreach ($this->user_attributes as $user_attribute) {
           $details[$user_attribute->attribute] = $this->decodeIfJson($user_attribute->value);
       }
       return $details;
   }

   public function user_attributes()
   {
       return $this->hasMany('billiard\Models\user_attribute');
   }
    /** For User acting as Customer **/


    /** For User acting as Technician **/

    /** For user acting as Reviewer **/
}
