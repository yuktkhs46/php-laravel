<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        //バリデーションを設定
        'title' => 'required',
        'body' => 'required',
    );
    
    
//NewsモデルとHistoryモデルを関連付ける
    public function histories()
    {
        return $this->hasMany('App\History');
    }
}

?>
