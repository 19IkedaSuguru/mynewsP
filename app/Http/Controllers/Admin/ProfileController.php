<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
// データベースに保存する
      $profile->fill($form);
      $profile->save();
        return redirect('admin/profile/create');
    }
    
 public function edit()
 {
 return view('admin.profile.edit');
 }
 public function update()
 {
 return redirect('admin/profile/edit');
 }
    
}
