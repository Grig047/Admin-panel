@extends('layouts.admin_layout')

@section('title', 'О Компании')
@section('header_title', 'О Компании')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form class="col-md-12" action="{{route('about_company_store', $post->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="text">Описание</label>
                        <textarea name="description" id="text" class="form-control" cols="30" rows="10"
                                  required>{{$post->description}}</textarea>
                    </div>

                    <div class="media_div form-group d-flex p-2">
                        <div style="margin-right: 20px">
                            <label>
                                <span>Фото</span>
                                <input type="file" accept="image/*, video/*" name="img">
                            </label>

                            <div class="display-img-vid-con">
                                {{--                                                                        @dd($post->getMedia('about_company')->where('model_id', $post->id)[0]['mime_type'])--}}
                                @if(count($post->getMedia('about_company_image')) > 0)
                                    <img class="img"
                                         src="{{asset('storage/'.$post->getMedia('about_company_image')->where('model_id', $post->id)[0]['id'].'/'.$post->getMedia('about_company_image')->where('model_id', $post->id)[0]['file_name'])}}"
                                         alt="image">
                                @endif
                            </div>
                        </div>
                        <div>
                            <label>
                                <span>Видео</span>
                                <input type="file" accept="image/*, video/*" name="video">
                            </label>

                            <div class="display-img-vid-con">
                                @if(count($post->getMedia('about_company_video')) > 0)
                                    <video controls class="video">
                                        <source
                                            src="{{asset('storage/'.$post->getMedia('about_company_video')->where('model_id', $post->id)[0]['id'].'/'.$post->getMedia('about_company_video')->where('model_id', $post->id)[0]['file_name'])}}">
                                    </video>
                                @endif
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Обновить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
