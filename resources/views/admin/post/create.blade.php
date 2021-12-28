@extends('layouts.admin_layout')

@section('title', 'Create Blog')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1 class="card-title">Create Blog</h1>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" id="title" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea name="text" id="text" class="form-control" cols="30" rows="10"
                                      required></textarea>
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
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
