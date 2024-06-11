@extends('layouts.admin.admin')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper">
                <h1>Vendors</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item">
                            <a href="{{url('home')}}">
                                <span class="mdi mdi-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Vendors</li>
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
                            <div class="alert alert-danger text-black">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body mt-3">
                            <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addModal">
                                Add Vendor
                            </button>
                            <table class="table mt-2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>ID No</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1 ?>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$user->first_name.' '.$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->id_no}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#updateModal{{$user->id}}">Update</a>
                                                    <a class="dropdown-item" href="{{url('/users/vendors/delete/'.$user->id)}}">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="updateModal{{$user->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{url('users/vendors/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" value="{{$user->id}}" name="id">
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" class="form-control" name="user_name" value="{{$user->user_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Contact Firstname</label>
                                                            <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Contact Lastname</label>
                                                            <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">ID No</label>
                                                            <input type="text" class="form-control" name="id_no" value="{{$user->id_no}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" class="form-control" name="address" value="{{$user->address}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-sm btn-outline-warning">
                                                            Not Now
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-success">
                                                            Update Vendor
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>

                                        <td colspan="5" class="text-center">
                                            <i class="fa fa-users fa-5x"></i>
                                            <p>No Vendors</p>
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
                        <form action="{{url('users/vendors/store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="user_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Contact Firstname</label>
                                    <input type="text" class="form-control" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Contact Lastname</label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">ID No</label>
                                    <input type="text" class="form-control" name="id_no">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-sm btn-outline-warning">
                                    Not Now
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                    Add Vendor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
