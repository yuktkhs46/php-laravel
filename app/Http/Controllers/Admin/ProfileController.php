<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

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
      $news = new Profile;
      $form = $request->all();
      
      unset($form['_token']);
      unset($form['image']);
      
      $news->fill($form);
      $news->save();
      
  
      // admin/profile/createにリダイレクトする
      return redirect('admin/profile/create');
  }  

public function edit()
{
    return ('admin.profile.edit');
}
public function update()
{
    return ('admin.profile.update');    
}
    
    
}
