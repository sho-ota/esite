<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use Carbon\Carbon;

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
        $today = new Carbon('today');
        $year_month_day = $today->toDateString();
        $day_of_week = $today->dayOfWeek;
        $week_list = ['0' => '日', '1' => '月', '2' => '火', '3' => '水', '4' => '木', '5' => '金', '6' => '土'];
        
        $what_days = DB::table('attendances')
        ->select('what_day')
        ->groupBy('what_day')
        ->get();
        
        // staff.homeのviewを呼び出し、そこに変数を渡す。
        return view('staff.home', [
            'what_days' => $what_days,
            'year_month_day' => $year_month_day,
            'day_of_week' => $day_of_week,
            'week_list' => $week_list,
        ]);
    }
}
