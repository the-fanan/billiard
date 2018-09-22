<?php

namespace billiard\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use billiard\Constants\Constants;
use billiard\Traits\Helper as BilliardHelpers;

class administrator extends Authenticatable
{
    use Notifiable,HasRoles,BilliardHelpers;

    protected $guard_name = 'admin';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /** General administrator relationships and functions **/
    public function setEmailAttribute($value) {
      $this->attributes['email'] = strtolower($value);
   }

   public function setPasswordAttribute($value) {
       $this->attributes['password'] = Hash::make($value);
   }

   public function getName()
   {
       return title_case($this->fullname);
   }

   public function getAdministratorDetails()
   {
       $details = [];
       foreach ($this->administrator_attributes as $administrator_attribute) {
           $details[$administrator_attribute->attribute] = $this->decodeIfJson($administrator_attribute->value);
       }
       return $details;
   }
   /**
   ******* for relations ***************
   **/
   public function administrator_attributes()
   {
       return $this->hasMany('billiard\Models\administrator_attribute');
   }

   public function organisation()
   {
       return $this->belongsTo('billiard\Models\organisation');
   }
}
