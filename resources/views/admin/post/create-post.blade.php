@extends('admin.admin-master')
@section('admin-content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Post</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black-50" href="./">Home</a></li>
                <li class="breadcrumb-item "><a class="text-black-50" href="{{ route('post.index') }}">Post
                        List</a>
                </li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('post.create') }}">Create Post</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Simple Tables</li> --}}
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Post Create</h6>
                <a href="{{ route('post.index') }}" class="btn text-primary">Back To Post List</a>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                        name="title" placeholder="Enter Your Name" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Post Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile"
                                            onchange="previewFile(this)">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <img id="previewImg" alt=""
                                            style="max-width: 100px; margin-top:20px; margin-bottom:20px;">
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-wrap">
                                    @foreach ($tags as $tag)
                                        <div class="form-check" style="margin-right:20px;">
                                            <input class="form-check-input" name="tags[]" type="checkbox"
                                                value="{{ $tag->id }}" id="tag{{ $tag->id }}">
                                            <label class="form-check-label" for="tag{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    {{-- <input type="text" class="form-control" id="description" placeholder="Password"> --}}
                                    <textarea class="form-control" id="description" name="description"
                                        placeholder="description here">{{ old('description') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection
@section('editor')
<link rel="stylesheet" href="{{ asset('backend/editor/summernote-bs4.min.css') }}">
<script src="{{ asset('backend/editor/summernote-bs4.min.js') }}"></script>
@endsection
