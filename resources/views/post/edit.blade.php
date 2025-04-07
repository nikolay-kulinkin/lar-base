@extends('layouts.main')

@section('content')
<div>
    <form action="{{route('post.update', $post)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{$post->title}}" name="title" id="title" placeholder="Title">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" value="{{$post->content}}" name="content" id="content" placeholder="Content"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="text" class="form-control" value="{{$post->image}}" name="image" id="image" placeholder="Image">
        </div>
        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                <option
                    {{$category->id === $post->category->id?'selected':''}}
                    value="{{$category->id}}">{{$category->title}}
                </option>
                @endforeach
            </select>
        </div>
       <div class="form-group mb-3">
        <label for="tags">Tag</label>
        <select multiple class="form-control" id="tags" name="tags[]">
            @foreach($tags as $tag)
            <option
            @foreach($post->tags as $postTag)
            {{$tag->id === $postTag->id?'selected':''}}
            @endforeach
             value="{{$tag->id}}">{{$tag->title}}
            </option>
            @endforeach
        </select>
</div>
<button type="submit" class="btn btn-primary mb-3">Update</button>
</form>
</div>
@endsection