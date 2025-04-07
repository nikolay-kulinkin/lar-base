<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
   public function __invoke(Post $post)
   {
     
      
      $categories = Category::all();
      $tags=Tag::all();
      return view('post.edit', compact('post', 'categories','tags'));
   
   }
}
