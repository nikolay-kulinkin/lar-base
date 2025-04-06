<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
      $posts = Post::all();
      return view('posts', compact('posts'));
      
   }

   public function create()
   {
      $postsArr = [
         [
            'title' => 'title of post from phpstorm',
            'content' => 'some interesting content',
            'image' => 'imageblabla.jpg',
            'likes' => 20,
            'is_published' => 1,
         ],
         [
            'title' => 'another title of post from phpstorm',
            'content' => 'another some interesting content',
            'image' => 'another imageblabla.jpg',
            'likes' => 50,
            'is_published' => 1,
         ],
      ];

      Post::create([
         'title' => 'another title of post from phpstorm',
         'content' => 'another some interesting content',
         'image' => 'another imageblabla.jpg',
         'likes' => 50,
         'is_published' => 1,
      ]);

      foreach ($postsArr as $item) {
         Post::create($item);
      }
   }

   public function update()
   {
      $post = Post::find(6);
      // dd($post->title);
      $post->update([
         'title' => 'updated',
         'content' => 'updated',
         'image' => 'updated',
         'likes' => 1000,
         'is_published' => 0
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

      $post = Post::withTrashed()->find(2);
      $post->restore();
   }

   public function firstOrCreate()
   {
      $post = Post::firstOrCreate([
         //    'title'=>'title of post from phpstorm'
         // ],[
         //    'title'=>'title of post from phpstorm',
         //    'content'=>'some content',
         //    'image'=>'some imageblabla.jpg',
         //    'likes'=>50000,
         //    'is_published'=>1
         // ]);

         'title' => 'some title phpstorm'
      ], [
         'title' => 'some title phpstorm',
         'content' => 'some content',
         'image' => 'some imageblabla.jpg',
         'likes' => 50000,
         'is_published' => 1
      ]);


      dump($post->content);
      dd('finished');
   }
}
