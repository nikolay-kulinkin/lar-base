<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;

class ShowController extends BaseController
{
   public function __invoke(Post $post)
   {
     return new PostResource($post);
      // return view('post.show', compact('post'));
   }
}
