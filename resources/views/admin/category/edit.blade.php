@extends('layouts.admin_layout')

@section('title', 'Edit Category')
@section('header_title', 'Edit Category: '.$category->title)

@section('content')
        <form method="post" action="{{route('category.update', $category->id)}}">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="name">Category name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$category->title}}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
@endsection
