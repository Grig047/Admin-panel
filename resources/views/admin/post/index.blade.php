@extends('layouts.admin_layout')

@section('title', 'Posts')
@section('header_title', 'Posts')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success mt-2 col-md-12" id="message">
            <h2><i class="fas fa-check"> {{ session()->get('message') }}</i></h2>
        </div>
    @endif
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
                            Title
                        </th>
                        <th>
                            Text
                        </th>
                        <th>
                            Image
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{$post->id}}
                            </td>
                            <td>
                                <a>
                                    {{$post->title}}
                                </a>
                                <br>
                                <small>
                                    {{$post->created_at}}
                                </small>
                            </td>
                            <td>
                                <div class="container">{{$post->text}}</div>
                            </td>
                            <td>
                                <div class="container"></div>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('post.edit', $post->id)}}">
                                    <button class="btn btn-info mr-auto">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </button>
                                </a>
                                <form action="{{route('post.destroy', $post->id)}}" method="post" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                        Deleting</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Delete Post?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter"
                                            class="btn btn-danger m-1"><i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <img src="{{asset('')}}">

                    @endforeach
                    </tbody>
                </table>
                @if($posts->count() === 0)
                    <div class="d-flex justify-content-center mt-5">
                        <h2 class="display-1 brand-text">NO POSTS</h2>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
