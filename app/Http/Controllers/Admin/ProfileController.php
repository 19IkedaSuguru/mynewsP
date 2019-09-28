<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//課題php14
use App\Profile;

class ProfileController extends Controller
{
    //課題 Admin/ProfileControllerに、
    //以下のadd, create, edit, update 
    //それぞれのActionを追加してみましょう。
    public function add ()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
      $this->validate($request, Profile::$rules);
        
      $profile = new Profile;
      $form = $request->all();
// データベースに保存する
      $profile->fill($form);
      $profile->save();
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {
    // 現在認証されているユーザーのID取得
    $user_id = Auth::id();
    return view('admin.profile.edit', ['user_id' => $user_id]);
     }
    public function update()
    {
        // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      $this->validate($request, Profile::$rules);
      // News Modelからデータを取得する
      $profile = Profile::find($profile_form['user_id']);
      
      unset($profile_form['_token']);

      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
    return redirect('admin/profile');
    }
    
}
