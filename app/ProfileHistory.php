<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
     protected $gurded = array('id');
     public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
        
        );
        
        public function profileHistories()
    {
      return $this->hasMany('App\ProfileHistory');

    }
}
