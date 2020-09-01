<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\History;
//Historyモデルが使えるようになった
use Carbon\Carbon;

class ProfileController extends Controller
{
    
    
public function add()
{
    return view('admin.profile.create');
}

public function create(Request $request)
  {    
      $this->validate($request,Profile::$rules);
      
      //バリデーションを行う
      //Profile::$rules = Profileモデル内の$rulesメソッドでバリデ
      $profile = new Profile;
      $form = $request->all();
      
      unset($form['_token']);
      
      
      $profile->fill($form);
      $profile->save();
      
  
      // admin/profile/createにリダイレクトする
      return redirect('admin/profile/create');
  }  


public function edit(Request $request)
{
      
      $profile = Profile::find($request->id);

      if (empty($profile)) {
        abort(404);    
      }
    return view('admin.profile.edit', ['profile_form' => $profile]);
}
public function update(Request $request)
{
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      
      
      unset($profile_form['_token']);
      

      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
      
       $history = new History;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();


      return redirect('admin/profile');    
}

public function delete(Request $request)
    {

        $profile = Profile::find($request->id);
        $profile->delete();
        return redirect('admin/profile/');
    }
    
    
}
