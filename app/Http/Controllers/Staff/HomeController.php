<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    
    
    // 利用者出欠確認表へのリンクを日付順に表示
    public function index()
    {
        /*
        what_dayカラムを日付ごとにグループとして認識させ、
        &what_daysに代入
        */
        $what_days = DB::table('attendances')
        ->select('what_day')
        ->groupBy('what_day')
        ->get();
        
        // staff.homeのviewを呼び出し、そこに変数を渡す。
        return view('staff.home', [
            'what_days' => $what_days,
        ]);
        
        
    }
}
