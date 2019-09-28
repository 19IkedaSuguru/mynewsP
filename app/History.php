<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules =array(
        'news_id' => 'required',
        'edited_at' => 'required'
    );
    
    //いか追記
    //Newsモデルに関連づけを行う
    public function histories()
    {
        return $this->hasMany('App\History');
    }
        
}
