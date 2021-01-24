<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function show()
    {
        $attendance = Attendance::findOrFail(1);

        return view('user.auth.home', [
            'attendance' => $attendance,
        ]);
    }
    
    
    public function update(Request $request,$id)
    {
        $request->validate([
            'select' => 'required|max:1',
        ]);
        
        $attendance = Attendance::findOrFail($id);
        $attendance->select = $request->select;
        $attendance->save();

        return redirect('user/home');
    }
}
