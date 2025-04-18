<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Filters\PostFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
      $data=$request->validated();
      $page=$data['page']??1;
      $perPage=$data['per_page']??10;
      $filter=app()->make(PostFilter::class, ['queryParams'=>array_filter($data)]);
      $posts=Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

      return PostResource::collection($posts);
     
      // return view('post.index', compact('posts')); 

     

     
   }
}
