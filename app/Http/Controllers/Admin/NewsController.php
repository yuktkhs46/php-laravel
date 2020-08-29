<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\News;//Newsモデルがつかえるようになった

class NewsController extends Controller
{
    
    public function add()
  {
      return view('admin.news.create');
  }
  
   public function create(Request $request)
  {    
      $this->validate($request,News::$rules);//バリデーションを行う
      //News::$rules = Newsモデル内の$rulesメソッドでバリデ
      $news = new News;
      $form = $request->all();
      
      
      if(isset($form['image'])){
          $path = $request->fie('image')->store('public/image');
          $news->inage_path = basename($path);
      }
      else
      {
          $news->image_path = null;
      }
      
      unset($form['_token']);
      unset($form['image']);
      
      $news->fill($form);
      $news->save();
      
  
      // admin/news/createにリダイレクトする
      return redirect('admin/news/create');
  }  
}
