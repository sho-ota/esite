<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    /*
    利用者出欠確認表を新規作成した時、
    日付が$requestに入り,
    各userのattendanceレコードを作成
    */
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
    
    /*
    利用者出欠確認表作成画面の下にある日付一覧から日付をクリックした時、
    日付が$requestに入り,利用者出欠確認表にて利用者を一覧表示
    */
    public function index(Request $request)
    {
        
        $request_what_day = $request->input('what_day');
        
        //$requestに入ったwhat_dayの値が入ったattendanceのレコードを一覧表示する。
        $attendances = Attendance::where('what_day',$request_what_day)->get();
        
        //利用者のデータを全て取得
        $users = User::all();
        
        /*
        $usersListに各ユーザのidを配列として持たせて、
        viewで$usersListの中から、attendance->user_idでユーザを特定し、
        そのlast_nameを取り出す
        */
        $usersList = [];
            foreach($users as $user){
                $usersList[$user->id] = $user;
            }
        
        //dd($usersList[1]["last_name"]);
        
        /*
        利用者一覧をidの降順で取得
        $users = User::orderBy('last_name_hiragana')->paginate(100);
        */
        return view('staff.auth.attendances_index', [
            'attendances'      => $attendances,
            'request_what_day'  => $request_what_day,
            'usersList'             => $usersList,
        ]);
        
    }
 
    
    public function create()
    {
        //
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
