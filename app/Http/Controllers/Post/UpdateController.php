<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
      $data=$request->validated();
      
      $post=$this->service->update($post, $data); 
      
      return $post instanceof Post?new PostResource($post):$post;
     
      // return redirect()->route('post.show', $post);
   }
}
