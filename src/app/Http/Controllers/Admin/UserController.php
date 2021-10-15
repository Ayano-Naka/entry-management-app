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

        $user_form = $request->all();
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('user/setting');
    } 
    public function editPassword(){
        return view('user.editpassword');
    }

    public function updatePassword(UpdatePasswordRequest $request){
        $user = \Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with('update_password_success','パスワードを変更しました。');
    }

    // プロフィールアイコン用

    // public function edit($id) {
        //     $user = Auth::user();
        //     return view('user.edit', ['user' => $user]);
        // }
    
        // public function update($id, UserRequest $request) {
        //     $user = Auth::user();
        //     $form = $request->all();
    
        //     $profileImage = $request->file('profile_image');
        //     if ($profileImage != null) {
        //         $form['profile_image'] = $this->saveProfileImage($profileImage, $id); // return file name
        //     }
    
        //     unset($form['_token']);
        //     unset($form['_method']);
        //     $user->fill($form)->save();
        //     return redirect('/home');
        // }
    
        // private function saveProfileImage($image, $id) {
        //     // get instance
        //     $img = \Image::make($image);
        //     // resize
        //     $img->fit(100, 100, function($constraint){
        //         $constraint->upsize(); 
        //     });
        //     // save
        //     $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        //     $save_path = 'public/profiles/'.$file_name;
        //     Storage::put($save_path, (string) $img->encode());
        //     // return file name
        //     return $file_name;
        // }
}
