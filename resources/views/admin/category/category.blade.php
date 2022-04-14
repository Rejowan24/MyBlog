@extends('admin.admin-master')
@section('admin-category')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black-50" href="./">Home</a></li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('category.index') }}">Category List</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Simple Tables</li> --}}
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                        <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>post count</td>
                                        <td>{{ $category->description }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('category.edit', [$category->id]) }}"
                                                class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                            {{-- <a href="{{ route('category.destroy',[$category->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
                                            <form action="{{ route('category.destroy', [$category->id]) }}"
                                                class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            <a href="" class="btn btn-sm btn-success mr-1"><i
                                                    class="fas fa-eye"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
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
                          {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->


    </div>
@endsection
