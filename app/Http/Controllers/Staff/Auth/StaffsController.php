<?php


namespace App\Http\Controllers\Staff\Auth;

use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; //追加


class StaffsController extends Controller
{
   protected function create()
    {
        $staff = new Staff;
        
        return view('staff.auth.staffs_create', [
            'staff' => $staff,
        ]);
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'last_name'           => 'required|string|max:255',
            'first_name'          => 'required|string|max:255',
            'last_name_hiragana'  => 'required|string|max:255',
            'first_name_hiragana' => 'required|string|max:255',
            'email'               => 'required|string|email|max:255|unique:users',
            'password'            => 'required|string|min:8|confirmed',
        ]);
        
        
        $staff = new Staff;
        $staff->last_name = $request->last_name;
        $staff->first_name = $request->first_name;
        $staff->last_name_hiragana = $request->last_name_hiragana;
        $staff->first_name_hiragana = $request->first_name_hiragana;
        $staff->email = $request->email;
        $staff->password = bcrypt($request->password);
        $staff->save();

        return redirect('staff/staffs');
    }
   
   
        public function index()
    {
        $staffs = Staff::orderBy('last_name_hiragana')->paginate(100);

        return view('staff.auth.staffs_index', [
            'staffs' => $staffs,
        ]);
    }
    
    
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
    
        return view('staff.auth.staff_edit', [
            'staff' => $staff,
        ]);
    }
    

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        
        $staff->last_name = $request->last_name;
        $staff->first_name = $request->first_name;
        $staff->last_name_hiragana = $request->last_name_hiragana;
        $staff->first_name_hiragana = $request->first_name_hiragana;
        $staff->email = $request->email;
        $staff->save();
    
        return redirect('staff/staffs');
    /*
    メールアドレスが他の人と重複している場合エラーが出てしまうのでそれを処理する必要ありバリデーションを使用？
    */
    }
    
    public function destroy_show($id)
    {
        $staff = Staff::findOrFail($id);
        
        return view('staff.auth.staff_destroy_show', [
            'staff' => $staff,
        ]);
    }
    
    
    public function destroy($id)
    {
    
        $staff = Staff::findOrFail($id);
    
        $staff->delete();
    
        return redirect('staff/staffs');
    }
}
