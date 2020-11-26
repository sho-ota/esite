<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
// 追加した
        return view('staff.home');
    }
}
