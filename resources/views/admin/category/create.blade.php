@extends('layouts.admin_layout')

@section('title', 'Create Category')
@section('header_title', 'Create Categories')

@section('content')
    <form class="col-md-12" action="{{route('category.store')}}" method="POST">
        @csrf
        <div class="form-outline mb-3 mt-4">
            <input type="text" id="form1Example1" name="cat_name" class="form-control" placeholder="Category name" required/>
        </div>

        <button type="submit" class="btn btn-primary">Create category</button>
    </form>
@endsection
