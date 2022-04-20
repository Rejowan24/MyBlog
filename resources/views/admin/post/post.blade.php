@extends('admin.admin-master')
@section('admin-content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Post</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black-50" href="./">Home</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('post.index') }}">Post List</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Simple Tables</li> --}}
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Post</h6>
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="table-responsive">
                        {{-- @if (Session::has('delete'))
                            <div class="alert alert-danger">
                                {{ Session::get('delete') }}
                            </div>
                        @endif --}}
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    {{-- <th>Post Count</th> --}}
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($posts->count())
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td><img src="{{ asset('storage/post/'.$post->image) }}" alt=""
                                                    class="image-fluid"
                                                    style="max-width: 80px; max-height:80px;"></td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->slug }}</td>
                                            {{-- <td>post count</td> --}}
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                @foreach ($post->tags as $tag)
                                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $post->user->name }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('post.show',[$post->id]) }}" class="btn btn-sm btn-success mr-1"><i
                                                    class="fas fa-eye"></i></a>
                                                <a href="{{ route('post.edit', [$post->id]) }}"
                                                    class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                                {{-- <a href="{{ route('post.destroy',[$tag->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
                                                <form action="{{ route('post.destroy', [$post->id]) }}"
                                                    class="mr-1" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No Posts Found.</h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav> --}}
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->


    </div>
@endsection
