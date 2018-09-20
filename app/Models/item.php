<?php

namespace billiard\Models;

use Illuminate\Database\Eloquent\Model;
use billiard\Constants\Constants;
use billiard\Traits\Helper as BilliardHelpers;

class item extends Model
{
    use BilliardHelpers;

    /**
    ******* for relations ***************
    **/
    public function item_attributes()
    {
        $this->hasMany('billiard\Models\item_attributes');
    }

    public function repair_request()
    {
        $this->hasOne('billiard\Models\repair_request');
    }

    public function customer()
    {
        $this->belongsTo('billiard\Models\user');
    }

    /**
    ******* for functions ***************
    **/
    public function getItemDetails()
    {
        $details = [];
        foreach ($this->item_attributes as $item_attribute) {
            $details[$item_attribute->attribute] = $this->decodeIfJson($item_attribute->value);
        }
        return $details;
    }
}
