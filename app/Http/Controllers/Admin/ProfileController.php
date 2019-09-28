<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
        $profile->fill($form);
        // 現在ログインしているユーザーのIDを取得して、Profileに紐付ける
        $profile->user_id = Auth::id();
        // データベースに保存する
        $profile->save();
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        //validate
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();
        // データベースに保存する
        $profile->fill($form);
        $profile->save();

        return view('admin.profile.edit');
    }


    public function update()
    {
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        return redirect('admin/profile');
    }
}
