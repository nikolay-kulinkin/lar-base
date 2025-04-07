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
        <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</div>
@endsection