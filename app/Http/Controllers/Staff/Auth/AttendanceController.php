<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class AttendanceController extends Controller
{

    public function index(Request $request)
    {
        
        //dd($request);
        
        //$request_what_day = $request;
        $request_what_day = $request->input('what_day');
        
        $attendances = Attendance::where('what_day',$request_what_day)->get();
        
        $users = User::all();
        
        $usersList = [];
            foreach($users as $user){
                $usersList[$user->id] = $user;
            }
        
        //dd($usersList[1]["last_name"]);
        
        /*
        // 利用者一覧をidの降順で取得
        $users = User::orderBy('last_name_hiragana')->paginate(100);
        */
        // 利用者一覧ビューでそれを表示
        return view('staff.auth.attendances_index', [
            //'users'            => $users,
            'attendances'      => $attendances,
            'request_what_day'  => $request_what_day,
            'usersList'             => $usersList,
        ]);
        
    }
 
    /*
    public function index(Request $request)
    {
        // 利用者一覧を取得
        //$users = User::all();
        
        
        /*
        // 出欠確認データ一覧を取得
        $attendances = Attendance::where('what_day',$request);
        
        foreach ($attendances as $attendance) {
            
            //$user_id = $attendance->user_id;
            //$user = User::where('id',$user_id)->get();
            //$attendance->comment;
            //$attendance->select;
            
            // 利用者出欠確認表一覧ビューでそれを表示
            return view('staff.auth.attendances_index', [
                'attendances' => $attendances,
            ]);
            
        }
        
    }
    */
    
    public function create()
    {
        //
    }
    
    
    //各userのattendanceレコードを作成
    public function store(Request $request)
    {
        $users = User::all();
      
        foreach ($users as $user) {
            
            $user->attendances()->create([
                'what_day' => $request->what_day,
            ]);
        }
        
        return view('staff.home');
        
    }
    
    
    public function show($request)
    {
        
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
