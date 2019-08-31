<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//以下を追加でnew modelを扱える
use App\News;

class NewController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }
    //php13  以下を追記
  public function create(Request $request)
  {
      //php14で更に追記
      //Validationを行う
      $this->validate(request, News::$rules);
      
      $news = new News;
      $form = $request->all();
      
      //フォームから画像が送信されてきたら、保存し、$news->image_pathに画像のパスを保存する
      if(isset($form['image'])){
          $path = $request->file('image')->store('public/image');
          $new->image_path = basename($path);
      } else {
          $news->image_path = null;
      }
      
      //フォームから送信されてきた_tokenを削除
      unset($form['_token']);
      //フォームから送信されてきたimageimageを削除
      unset($form['image']);
      //データベースに保存
      $news->fill($form);
      $news->save();
      
      // admin/news/createにリダイレクトする
      return redirect('admin/news/create');
  }  
}
