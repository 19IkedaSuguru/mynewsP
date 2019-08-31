<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    //課題php17 5【応用】 Modelを作成するコマンドで Profile というModelを作成し、 
    //名前(name)、性別(gender)、趣味(hobby)、自己紹介(introduction)に対してValidationをかける
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );
    
}
