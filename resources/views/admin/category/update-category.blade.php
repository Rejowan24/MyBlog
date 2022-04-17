@extends('admin.admin-master')
@section('admin-content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black-50" href="./">Home</a></li>
                <li class="breadcrumb-item "><a class="text-black-50" href="{{ route('category.index') }}">Category List</a>
                </li>
                <li class="breadcrumb-item "><a class="text-black-50" href="{{ route('category.create') }}">Create Category</a></li>
                <li class="breadcrumb-item text-primary"><a href="#">Update Category</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Simple Tables</li> --}}
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Category Update</h6>
                <a href="{{ route('category.index') }}" class="btn text-primary">Back To Category List</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- @if (Session::has('updated'))
                    <div class="alert alert-success">
                        {{ Session::get('updated') }}
                    </div>
                @endif --}}
                <form action="{{ route('category.update',[$category->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="{{ $category->name }}"
                            placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        {{-- <input type="text" class="form-control" id="description" placeholder="Password"> --}}
                        <textarea class="form-control" id="description" name="description" >{{ $category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
@endsection
