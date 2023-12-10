@extends('layouts.admin')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        Create Department
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.dept.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

{{-- @if (!isset($viewData["title"])) --}}

{{-- @foreach ($courses as $course  ) --}}

<div class="card">
<div class="card-header">
    {{-- <h3>{{$course->name}}</h3> --}}
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $dept  )
        <tr>
            <td>{{ $dept->id }}</td>
            <td>{{ $dept->name }}</td>
            {{-- <td><img src="{{ asset('/storage/exam/'.$course["image_url"]) }}" alt="" width="2rem;" height="2rem;" class="img-profile rounded-circle"></td> --}}
            <td>
                <a href="{{ route('admin.dept.edit', ['id'=>$dept->id]) }}">
                    <button class="btn btn-primary">
                        <i class="bi-pencil"></i>
                    </button>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.dept.delete', $dept->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        <i class="bi-trash"></i>
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
    {{-- <tfoot>
        <a href="{{ route('admin.lesson.add', ['id'=>$course->id]) }}"> Add Lesson</a>
    </tfoot> --}}
</table>
</div>
</div>
{{-- @endforeach --}}
{{-- @endif --}}
@endsection
