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
      // 現在ログインしているユーザーのIDを取得して、Profileに紐付ける
      $profile->user_id = Auth::id();
      //データベースに保存ずる
      $profile->save();
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {
    // 現在認証されているユーザーのID取得してそれに合致するprofileを取得
    $profile_form = Plofile::where('user_id' , Auth::id())->first();
    return view('admin.profile.edit', ['profile_form' => $profile_form]);
     }
    public function update(Request $request)
    {
       
       $this->validate($request, Profile::$rules);
       //現在ログインしているユーザーのidを取得してそれに合致するprofileを取得
       $profile = Profile::where('user_id', Auth::id())->first();
        // 送信されてきたフォームデータを格納する
       $profile_form = $request->all();
       unset($profile_form['_token']);

       // 該当するデータを上書きして保存する
       $profile->fill($profile_form)->save();
       return redirect('admin/profile/edit');
    }
    
}
