@extends('layouts.admin.admin')
@section('title','Categories')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper">
                <h1>Categories</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item">
                            <a href="{{url('home')}}">
                                <span class="mdi mdi-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Categories</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        @if (session('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('alert-success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger text-white mb-1">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addModal">
                                Add Category
                            </button>
                            <table class="table mt-2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=1?>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#updateModal{{$category->id}}">Update</a>
                                                    <a class="dropdown-item" href="{{url('/categories/delete/'.$category->id)}}">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="updateModal{{$category->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{url('/categories/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" value="{{$category->id}}" name="id">
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" class="form-control" name="name" id="" value="{{$category->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-sm btn-outline-warning" data-dismiss="modal">
                                                            Not Now
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-success">
                                                            Update Category
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <i class="fa fa-file fa-5x"></i>
                                            <p>No Categories</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{url('/categories/store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-sm btn-outline-warning" data-dismiss="modal">
                                    Not Now
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                    Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
