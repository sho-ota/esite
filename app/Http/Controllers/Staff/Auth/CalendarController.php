<?php

namespace App\Http\Controllers\Staff\Auth;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function show(){
		
		$calendar = new CalendarView(time());

//dd($calendar);

		return view('staff.auth.calendar', [
			"calendar" => $calendar
		]);
	}
}
