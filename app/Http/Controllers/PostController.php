<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
   //  $posts = Post::where('is_published', 1)->get();
   //  foreach($posts as $post){
   //    dump($post->title);
   //  }
   $post = Post::where('is_published', 1)->first();
   dd($post->title);
    
   

   } //
}
