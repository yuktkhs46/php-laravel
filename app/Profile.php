<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        //バリデーションを設定
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    
    //プロフィールとヒストリーを関連づけ
        public function profileHistory()
    {
      return $this->hasMany('App\ProfileHistory');

    }
}
?>