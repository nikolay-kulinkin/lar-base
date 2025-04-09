@extends('layouts.admin')

@section('content')
<div>
    <div>
        <a href="{{route('post.create')}}" type="button" class="btn btn-primary mb-3">Add one</a>
    </div>
    @foreach($posts as $post)
    <div>
        <a href="{{route('post.show',$post)}}">{{$post->id}}.{{$post->title}}</a>
    </div>
    @endforeach
    <div>
        {{$posts->withQueryString()->links('pagination::bootstrap-5')}}
    </div>
</div>
@endsection