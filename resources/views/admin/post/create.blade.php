@extends('layouts.admin_layout')

@section('title', 'Create Blog')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Create Blog</h1>
        </div>
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" id="title" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea name="text" id="text" class="form-control" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="feature_image">Feature Image</label>
                    <input type="text" id="feature_image" name="img" value="" readonly required>
                    <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>
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
        <!-- /.card-body -->
    </div>
@endsection
