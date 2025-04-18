<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
      $data=$request->validated();
      $post=$this->service->store($data);
     
      return $post instanceof Post?new PostResource($post):$post;
      
      
      // return redirect()->route('post.index');
   
   }
}
