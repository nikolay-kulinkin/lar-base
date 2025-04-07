<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
      $posts = Post::all();
      return view('post.index', compact('posts'));
   }

   public function create()
   {
      $categories = Category::all();
      $tags=Tag::all();
      return view('post.create', compact('categories', 'tags'));
   }

   public function store()
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

   public function show(Post $post)
   {
      return view('post.show', compact('post'));
   }

   public function edit(Post $post)
   {
      $categories = Category::all();
      $tags=Tag::all();
      return view('post.edit', compact('post', 'categories','tags'));
   }

   public function update(Post $post)
   {
     
      $data=request()->validate([
         'title'=>'string',
         'content'=>'string',
         'image'=>'string',
         'category_id'=>'',
         'tags'=>''
      ]);
      $tags=$data['tags'];
      unset($data['tags']);
      $post->update($data);
      $post->tags()->sync($tags);
      return redirect()->route('post.show', $post);
   }

   public function destroy(Post $post)
   {
      $post->delete();
      return redirect()->route('post.index');
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
