@extends('layouts.admin')
@section('title', 'Admin Courses')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        Create Task
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
            </ul>
        @endif
        @if (isset($question))
        <form method="POST" action="{{ route('admin.quiz.update' ,$question->id) }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Question:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="question" value="{{ $question->question }}" type="text" class="form-control">
                            <input name="quiz_id" value="{{ $quiz_id}}" type="hidden" >

                        </div>
                    </div>
                </div>

                <div class="row">
                    <label for="">Answer : {{ $question->answer}}</label>
                    <div class="col">
                        <div class="mb-3 mt-3">
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="a" >
                                <input type="text" name="option1" value="{{ $question->option1 }}">
                            </label>
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="b">
                                <input type="text" name="option2" value="{{ $question->option2 }}">
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 mt-3">
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="c">
                                <input type="text" name="option3" value="{{ $question->option3 }}">
                            </label>
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="d" >
                                <input type="text" name="option4" value="{{ $question->option4 }}" >
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @else
        <form method="POST" action="{{ route('admin.quiz.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Question:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="question" value="{{ old('question') }}" type="text" class="form-control">
                            <input name="quiz_id" value="{{ $quiz_id}}" type="hidden" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3 mt-3">
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="a">
                                <input type="text" name="option1" >
                            </label>
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="b">
                                <input type="text" name="option2" >
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 mt-3">
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="c">
                                <input type="text" name="option3" >
                            </label>
                            <label for="o" class="form-label">
                                <input type="radio" name="answer" value="d">
                                <input type="text" name="option4" >
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endif

    </div>
</div>

{{-- @if (!isset($viewData["title"])) --}}

{{-- @foreach ($lessons as $lesson  ) --}}

<div class="card">
<div class="card-header">
    <h3>  Tasks</h3>
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Question</th>
        <th scope="col">Option1</th>
        <th scope="col">Option2</th>
        <th scope="col">Option3</th>
        <th scope="col">Option4</th>
        <th scope="col">Answer</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($quizquestion as $quiz)
        <tr>
            <td>{{ $quiz->id }}</td>
            <td>{{ $quiz->question }}</td>
            <td>{{ $quiz->option1 }}</td>
            <td>{{ $quiz->option2 }}</td>
            <td>{{ $quiz->option3 }}</td>
            <td>{{ $quiz->option4 }}</td>
            <td>{{ $quiz->answer }}</td>
            <td>
                <a href="{{ route('admin.quiz.edit', ['id'=>$quiz->id]) }}">
                    <button class="btn btn-primary">
                        <i class="bi-pencil"></i>
                    </button>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.question.delete', $quiz->id)}}" method="POST">
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
{{-- @endforeach
@endif --}}
@endsection
