<?php

namespace billiard\Http\Controllers;

use Illuminate\Http\Request;
use billiard\Models\user;
use billiard\Models\user_attribute;
use billiard\Models\administrator;
use billiard\Models\administrator_attribute;
use billiard\Models\organisation;
use billiard\Models\action_trail;
use billiard\Constants\Constants;
use billiard\Traits\Helper as BilliardHelpers;

class TechnicianController extends Controller
{
    use BilliardHelpers;
    private $technician;

    public function showFixRequest()
    {
        return view('frontend.technician.fix-request');
    }

    public function showFixRequestDashboard()
    {
        return view('frontend.technician.dashboard');
    }
}
