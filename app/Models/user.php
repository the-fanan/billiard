<?php

namespace billiard\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class user extends Authenticatable
{
    use Notifiable,HasRoles;
    //
}
