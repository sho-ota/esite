<?php

namespace App\Http\Controllers\Staff\Auth;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        return view('staff.test');
    }
}
