<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
      // $post=Post::find(1);
      // dd($post->title);
      $posts = Post::all();
      foreach($posts as $post){
         dump($post->title);
      }

   //  $posts = Post::where('is_published', 1)->get();
   //  foreach($posts as $post){
   //    dump($post->title);
   // //  }

   // $post = Post::where('is_published', 1)->first();
   // dd($post->title);
   } 

   public function create()
   {
      $postsArr = [
         [
            'title'=>'title of post from phpstorm',
            'content'=>'some interesting content',
            'image'=>'imageblabla.jpg',
            'likes'=>20,
            'is_published'=>1,
         ],
         [
            'title'=>'another title of post from phpstorm',
            'content'=>'another some interesting content',
            'image'=>'another imageblabla.jpg',
            'likes'=>50,
            'is_published'=>1,
         ],
      ];

      // Post::create([
      //    'title'=>'another title of post from phpstorm',
      //    'content'=>'another some interesting content',
      //    'image'=>'another imageblabla.jpg',
      //    'likes'=>50,
      //    'is_published'=>1,
      // ]);
      
      foreach ($postsArr as $item) {
         Post::create($item);
      }
   }

   public function update()
   {
      $post=Post::find(6);
      // dd($post->title);
      $post->update([
         'title'=>'updated',
         'content'=>'updated',
         'image'=>'updated',
         'likes'=>1000,
         'is_published'=>0
      ]);
      dd('updated');
   }

   public function delete()
   {
      // $post=Post::find(6);
      // $post->delete();
      // dd($post);

      // $post=Post::find(2);
      // $post->delete();
      // dd('softdelete');

      $post=Post::withTrashed()->find(2);
      $post->restore();
   }
}
