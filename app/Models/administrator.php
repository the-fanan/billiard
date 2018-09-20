<?php

namespace billiard\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
}
