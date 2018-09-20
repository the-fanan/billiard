<?php

namespace billiard\Models;

use Illuminate\Database\Eloquent\Model;

class repair_requests extends Model
{
    //
    public function technician()
    {
        $this->belongsTo('billiard\Models\user','technician');
    }

    public function reviewer()
    {
        $this->belongsTo('billiard\Models\user','reviewer');
    }

    public function item()
    {
        $this->belongsTo('billiard\Models\item');
    }
}
