@extends('admin.admin-master')
@section('admin-content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Post</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black-50" href="./">Home</a></li>
                <li class="breadcrumb-item "><a class="text-black-50" href="{{ route('post.index') }}">View
                        List</a>
                </li>
                {{-- <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('post.create') }}">Create Post</a></li> --}}
                <li class="breadcrumb-item text-primary"><a href="#">View Post</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Simple Tables</li> --}}
            </ol>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">View Post</h6>
                            <a href="{{ route('post.index') }}" class="btn text-primary">Back To Post List</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Image</th>
                                        <td><img class="rounded"
                                                src="{{ asset('storage/post/' . $post->image) }}" alt="post image"
                                                style="width:300px; height:200px;"></td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $post->title }}</td>
                                    </tr>

                                    <tr>
                                        <th>Category Name</th>
                                        <td>{{ $post->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Post Tags</th>
                                        <td>
                                            @foreach ($post->tags as $tag)
                                                <span class="badge badge-primary">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Author Name</th>
                                        <td>{{ $post->user->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $post->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
