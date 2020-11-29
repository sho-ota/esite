<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

// 追加した
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    
    
    public function index()
    {
        $what_days = DB::table('attendances')
        ->select('what_day')
        ->groupBy('what_day')
        ->get();
        
        return view('staff.home', [
            'what_days' => $what_days,
        ]);
        
    }
}
