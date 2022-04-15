@extends('admin.admin-master')
@section('admin-tag')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tag</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black-50" href="./">Home</a></li>
                <li class="breadcrumb-item "><a class="text-black-50" href="{{ route('tag.index') }}">Tag
                        List</a>
                </li>
                <li class="breadcrumb-item text-primary"><a href="{{ route('tag.create') }}">Create Tag</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Simple Tables</li> --}}
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">tag Create</h6>
                <a href="{{ route('tag.index') }}" class="btn text-primary">Back To tag List</a>
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
                {{-- @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif --}}
                {{-- <script>
                    @if (Session::has('success'))
                        Toastify({ text: "{{ Session::get('success') }}", duration: 3000,
                        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
                        }).showToast();
                    @endif
                </script> --}}

                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                            placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        {{-- <input type="text" class="form-control" id="description" placeholder="Password"> --}}
                        <textarea class="form-control" id="description" name="description" placeholder="description here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
