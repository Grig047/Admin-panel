@extends('layouts.admin_layout')

@section('title', 'Edit Post')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Edit Blog: {{$post->title}}</h1>
        </div>
        <form action="{{route('post.update', $post->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" id="title" class="form-control" name="title" value="{{$post->title}}" required>
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea name="text" id="text" class="form-control" cols="30" rows="10" required>{{$post->text}}</textarea>
                </div>
                <div class="form-group">
                    <label for="feature_image">Feature Image</label>
                    <input type="text" id="feature_image" name="img" value="{{$post->img}}" readonly required>
                    <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>
                </div>
                <div class="form-group">
                    <label for="cat_id">Select Category</label>
                    <select id="cat_id" class="form-control custom-select" name="cat_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if ($category->id === $post->cat_id) selected @endif>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <!-- /.card-body -->
    </div>
@endsection
