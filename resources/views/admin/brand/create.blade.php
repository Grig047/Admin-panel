@extends('layouts.admin_layout')

@section('title', 'Создать бренд')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1 class="card-title">Создать бренд</h1>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('brand_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" id="title" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Описание</label>
                            <textarea name="description" id="text" class="form-control" cols="30" rows="10"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <img src="" id="display-image">
                        </div>
                        <div class="form-group">
                            <input type="file" id="img" name="img" value="" onChange="handleImageUpload()">
                        </div>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
