<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePasswordRequest;

class UserController extends Controller
{
    public function index(){
        return view('user.setting', ['user' => Auth::user() ]);
    }
    
    public function update(Request $request) {

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('public');
            $user->profile_image = basename($path);
            }
            $user->save();
            return redirect('user/setting');
    }


    public function editPassword(){
        return view('user.editpassword',['user' => Auth::user() ]);
    }

    public function updatePassword(UpdatePasswordRequest $request){
        $user = \Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with('update_password_success','パスワードを変更しました。');
    }
}
