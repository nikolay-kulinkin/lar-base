<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   public function __invoke()
   {
     
      // $post = Post::find(1);
      // dd($post->category);

      // $category = Category::find(1);
      // dd($category->posts);

      // $tag = Tag::find(1);
      // dd($tag->posts);

      // dd($post->tags);
      $posts=Post::all();
      return view('post.index', compact('posts')); 
   }
}
