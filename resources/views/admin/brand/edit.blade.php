@extends('layouts.admin_layout')

@section('title', 'Обновить Бренд')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Обновить Бренд: {{$brand->title}}</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{route('brand_update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$brand->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{$brand->title}}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="text">Описание</label>
                                <textarea name="description" id="text" class="form-control" cols="30" rows="10"
                                          required>{{$brand->description}}</textarea>
                            </div>
                            <div class="form-group">
                                @if(count($brand->getMedia('brand_logo')->where('model_id', $brand->id)) > 0)
                                    <img src="{{asset('storage/'.$brand->getMedia('brand_logo')->where('model_id', $brand->id)[0]['id'].'/'.$brand->getMedia('brand_logo')->where('model_id', $brand->id)[0]['file_name'])}}" id="display-image" style="width: 15%; height: 15%;">
                                @else
                                    <img src="" id="display-image">
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="file" id="img" name="img" value="" onChange="handleImageUpload()">
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
