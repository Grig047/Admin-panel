@extends('layouts.admin_layout')

@section('title', 'Categories')
@section('header_title', 'Categories')

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
                            Category Name
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                <a>
                                    {{$category->title}}
                                </a>
                                <br>
                                <small>
                                    {{$category->created_at}}
                                </small>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('category.edit', $category->id)}}">
                                    <button class="btn btn-info mr-auto">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </button>
                                </a>
                                <form action="{{route('category.destroy', $category->id)}}" method="post"
                                      class="d-inline">
                                @csrf
                                @method("DELETE")
                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Deleting</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Delete Category?</h4>
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
                    @endforeach
                    </tbody>
                </table>
                @if($categories->count() === 0)
                    <div class="d-flex justify-content-center mt-5">
                        <h2 class="display-1 brand-text">NO CATEGORIES</h2>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
