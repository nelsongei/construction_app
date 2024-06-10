@extends('layouts.admin.admin')
@section('title','Products')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper">
                <h1>Products</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item">
                            <a href="{{url('home')}}">
                                <span class="mdi mdi-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Products</li>
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
                                Add Product
                            </button>
                            <table class="table mt-2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=1?>
                                @forelse($products as $product)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td><img src="{{asset('').'storage/'.$product->image}}" height="100px"></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#updateModal{{$product->id}}">Update</a>
                                                    <a class="dropdown-item" href="{{url('/products/delete/'.$product->id)}}">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">
                                            <i class="fa fa-file fa-5x"></i>
                                            <p>No Products</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="addModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{url('/products/store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="number" min="1" name="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button class="btn btn-sm btn-outline-warning" data-dismiss="modal">
                                        Not Now
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        Add Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
