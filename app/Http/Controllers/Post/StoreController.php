<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
   public function __invoke()
   {
     
      $data=request()->validate([
      
         'title'=>'required|string',
         'content'=>'required|string',
         'image'=>'required|string',
         'category_id'=>'',
         'tags'=>''
      ]);

      $tags=$data['tags'];
      unset($data['tags']);
      $post=Post::create($data);
      $post->tags()->attach($tags);
      return redirect()->route('post.index');
   
   }
}
