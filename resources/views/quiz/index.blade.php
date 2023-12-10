@extends('layouts.admin')
@section('title', "Home ")
@section('content')

<div class="card mb-4">
    <div class="card-header">
        Create New  Quiz
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.quiz.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-2 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-2 row">

                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Course:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <select class="form-select" name="course_id">
                                @foreach ($courses as $course )
                                <option  value="{{$course->id}}" @selected(old('course_id') == $course->id) > {{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="file_url"  type="file" class="form-control">
                        </div>
                    </div>
                </div>
            {{-- </div>
                <div class="mb-3 form-check">
                <label class="form-check-label">is Final Exam?</label>
                <input type="checkbox" name="isfinal" id="isfinal"  class="form-check-input" >
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>



<hr>
{{-- <h3> Levels with Content</h3> --}}

{{-- @foreach ($quizquestion as $quiz  ) --}}

<div class="card">
    <div class="card-header">
        {{-- <h3>{{$quiz->name}}</h3> --}}
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
                    @foreach ($quizquestion as $quiz  )
                    <tr>
                        <td>{{ $quiz->id }}</td>
                        <td>{{ $quiz->name }}</td>
                        <td><img src="{{ asset('/storage/quiz/'.$quiz["file_url"]) }}" alt="" width="2rem;" height="2rem;" class="img-profile rounded-circle"></td>
                        <td>
                            <a href="{{ route('admin.quiz.add', ['id'=>$quiz->id]) }}">
                                <button class="btn btn-primary">
                                    <i class="bi-pencil"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.quiz.delete', $quiz->id)}}" method="POST">
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
            </table>
        </div>
    {{-- </div> --}}
@endsection
