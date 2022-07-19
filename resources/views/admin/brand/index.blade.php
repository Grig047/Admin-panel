@extends('layouts.admin_layout')

@section('title', 'Бренды')
@section('header_title', 'Бренды')

@section('content')
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <section>
        <div class="content">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 5%">
                            ID
                        </th>
                        <th>
                            Название
                        </th>
                        <th>
                            Отображать на сайте
                        </th>
                        <th>
                            <a class="btn" href="{{route('brand_create')}}">Добавить новый +</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <td>
                            {{$brand->id}}
                        </td>
                        <td>
                            <a>
                                {{$brand->title}}
                            </a>
                            <br>
                            <small>
                                {{$brand->created_at}}
                            </small>
                        </td>
                        <td>
                            <input type="checkbox" class="{{$brand->id}}" name="active" @if($brand->active) checked @endif style="cursor: pointer">
                        </td>
                        <td>
                            <div class="container">{{$brand->text}}</div>
                        </td>
                        <td>
                            <div class="container"></div>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm mb-1" href="{{route('brand_edit', $brand->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Обновить
                            </a>
                            <form method="POST" action="{{route('brand_destroy', $brand->id)}}">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger admin_del_btn" style="padding: 3%"><i class="fas fa-trash"></i> Удалить</button>
                                </div>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($brands->count() === 0)
                    <div class="d-flex justify-content-center mt-5">
                        <h2 class="display-1 brand-text">NO BRANDS</h2>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
