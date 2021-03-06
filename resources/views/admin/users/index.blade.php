@extends('layouts.admin_layout')

@section('title', 'users')
@section('header_title', 'Users')

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
                            Name
                        </th>
                        <th>
                            E-mail
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                <a>
                                    {{$user->name}}
                                </a>
                                <br>
                                <small>
                                    {{$user->created_at}}
                                </small>
                            </td>
                            <td>
                                <div class="container">{{$user->email}}</div>
                            </td>
                            <td class="project-actions text-right">
                                <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline">
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
                                                    <h4>Delete user?</h4>
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
                @if($users->count() === 0)
                    <div class="d-flex justify-content-center mt-5">
                        <h2 class="display-1 brand-text">NO USERS</h2>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection

