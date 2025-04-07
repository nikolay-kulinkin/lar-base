@extends('layouts.main')

@section('content')
<div>
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title" placeholder="Title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content">{{old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="text" class="form-control" value="{{old('image')}}" name="image" id="image" placeholder="Image">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                <option {{old('category_id') == $category->id?'selected':''}}
                    value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="tags">Tag</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Create</button>
    </form>
</div>
@endsection