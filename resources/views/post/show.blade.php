@extends('layouts.main')

@section('content')
        <div>
            <div>{{$post->id}}.{{$post->title}}</div>
            <div>{{$post->content}}</div>
            <div>
                <a href="{{route('post.edit', $post)}}" class="btn btn-success mb-3">Edit</a>
            </div>
            <div>
                <a href="{{route('post.index')}}" type="button" class="btn btn-primary mb-3">Back</a>
            </div>
            <form action="{{route('post.delete', $post)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger mb-3" value="Delete">
            </form>
        </div>
 @endsection