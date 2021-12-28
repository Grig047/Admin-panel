@extends('layouts.admin_layout')

@section('title', 'Edit Post')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Edit Blog: {{$post->title}}</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Blog Title</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{$post->title}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="text">Text</label>
                                <textarea name="text" id="text" class="form-control" cols="30" rows="10"
                                          required>{{$post->text}}</textarea>
                            </div>
                            <div class="form-group">
                                <img src="" id="display-image">
                            </div>
                            <div class="form-group">
                                <input type="file" id="img" name="img" value="" onChange="handleImageUpload()">
                            </div>
                            <div class="form-group">
                                <label for="cat_id">Select Category</label>
                                <select id="cat_id" class="form-control custom-select" name="cat_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
