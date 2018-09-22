<?php

namespace billiard\Models;

use Illuminate\Database\Eloquent\Model;

class organisation extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
    ******* for accessors ***************
    **/
    /** General user relationships and functions **/
    public function getNameAttribute($value) {
      $this->attributes['name'] = title_case($value);
   }

   /**
   ******* for relations ***************
   **/
    
}
