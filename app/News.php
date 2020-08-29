<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
       protected $guarded = array('id');
       public static $rules = array(
        'title' => 'required',//バリデーションでデータが異常であることを見つけたときには、データを保存せずに入力フォームへ戻すようにする。
        'body' => 'required',
    );
}

//NewsControllerないでココ（Newsモデル）が読み込まれてる。
//Newsモデル内に記述された$rulesメソッドが使われてる