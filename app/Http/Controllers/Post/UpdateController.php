<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
      $data=$request->validated();
        
      $tags=$data['tags'];
      unset($data['tags']);
      $post->update($data);
      $post->tags()->sync($tags);
      return redirect()->route('post.show', $post);
   }
}
