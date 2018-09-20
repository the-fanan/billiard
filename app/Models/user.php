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
     * The attributes that are not mass assignable.
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

    /**
    ******* for mutators ***************
    **/
    /** General user relationships and functions **/
    public function setEmailAttribute($value) {
      $this->attributes['email'] = strtolower($value);
   }

   public function setPasswordAttribute($value) {
       $this->attributes['password'] = bcrypt($value);
   }

   /**
   ******* for relations ***************
   **/

   public function user_attributes()
   {
       return $this->hasMany('billiard\Models\user_attribute');
   }

   public function items()
   {
       $this->hasMany('billiard\Models\item');
   }

   /**
   ******* for functions ***************
   **/
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


    /** For User acting as Customer **/


    /** For User acting as Technician **/

    /** For user acting as Reviewer **/
}
