<?php

namespace billiard\Models;

use Illuminate\Database\Eloquent\Model;

class action_trail extends Model
{
    //
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
    * Save an action
    *
    * @param $data = ["action", "doer", "receiver" = null, "item_id" = null]
    */
    public static function addAction($data)
    {
        return self::create($data);
    }
}
