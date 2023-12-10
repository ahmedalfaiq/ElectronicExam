@extends('layouts.admin')
@section('content')
    <div class="container mt-4">

        <h2>Add Exam</h2>


        <form action="{{ route('admin.exam.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="dept_id">Department :</label>
                        <select name="dept_id" id="dept_id" class="form-select" >
                            @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        <label for="level_id">Level :</label>
                        <select name="level_id" id="level_id" class="form-select" >
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="text">Title </label>
                        <input class="form-control" id="text" name="title" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="text">Subject </label>
                        <input class="form-control" id="text" name="subject" required>
                    </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="duration">duration  </label>
                        <input type="time" class="form-control" id="duration" name="duration" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="start_datetime">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="start_datetime">Start Date:</label>
                        <input type="date" class="form-control" id="start_datetime" name="start_datetime" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="end_datetime">End Date:</label>
                        <input type="date" class="form-control" id="end_datetime" name="end_datetime" required>
                    </div>

                </div>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="active" id="active" checked>
            <label class="form-check-label" for="active">
                Active ?
            </label>
            </div>
            <button type="submit" class="btn btn-primary">Add </button>
        </form>
    </div>
<hr>
    <div class="card">
        <div class="card-header">
            {{-- <h3>{{$quiz->name}}</h3> --}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Titel</th>
                        <th scope="col">Level</th>
                        <th scope="col">Dept</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam  )

                    <tr>
                        <td>{{ $exam->title }}</td>
                        <td>{{ $exam->level->name }}</td>
                        <td>{{ $exam->dept->name }}</td>
                        <td>{{ $exam->subject }}</td>
                        <td>{{ $exam->duration }}</td>
                        <td>{{ $exam->start_datetime }}</td>
                        <td>{{ $exam->end_datetime }}</td>
                        <td><img src="{{ asset('/storage/exam/'.$exam["image"]) }}" alt="" width="2rem;" height="2rem;" class="img-profile rounded-circle"></td>
                        <td>
                            <a href="{{ route('admin.exam.edit', ['id'=>$exam->id]) }}">
                                <button class="btn btn-primary">
                                    <i class="bi-pencil"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.exam.delete', $exam->id)}}" method="POST">
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
    </div>


@endsection
