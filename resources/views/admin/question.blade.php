@extends('layouts.admin')
@section('content')
@if (@isset($question))
    <div class="container mt-4">
        <h2>Update Question</h2>
        <!-- Question Form -->
        <form action="{{ route('admin.question.update',[$question->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="type">Question Type:</label>
                        <select name="type" id="type" class="form-select" >
                            <option value="multiple_choice"  @selected( 'multiple_choice' == $question->type) >Multiple Choice</option>
                            <option value="open_ended" @selected( 'open_ended' == $question->type) >Open Ended</option>
                            <option value="true_false"  @selected( 'true_false' == $question->type)>True False</option>
                        </select>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="text">Question Text:</label>
                        <textarea class="form-control" id="text" name="question" rows="3"  >{{ $question->question }}</textarea>
                    </div>
                </div>
            </div>
            {{-- <hr>
            <div class="row">
            </div> --}}
            <hr>
            <div class="row">
                    <div class="col-8">
                        <div id="questionForm">
                        </div>
                    </div>

                <div class="col-2">
                    <div class="form-group">
                        <label for="points_awarded">Points Awarded:</label>
                        <input type="number" class="form-control" id="points_awarded" name="points_awarded" value="{{ $question->points_awarded }}" required>
                        <input type="hidden" class="form-control" id="exam_id" name="exam_id"  value="{{ $exam->id }}">
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </div>
            </div>
        </form>
    </div>
@else
    <div class="container mt-4">
        <h2>Add Question</h2>
        <!-- Question Form -->
        <form action="{{ route('admin.question.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="type">Question Type:</label>
                        <select name="type" id="type" class="form-select" >
                            <option value="multiple_choice">Multiple Choice</option>
                            <option value="open_ended">Open Ended</option>
                            <option value="true_false">True False</option>
                        </select>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="text">Question Text:</label>
                        <textarea class="form-control" id="text" name="question" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            {{-- <hr>
                <div class="row">
                </div> --}}
                <hr>
            <div class="row">
                <div class="col-8">
                    <div id="questionForm">
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label for="points_awarded">Points Awarded:</label>
                        <input type="number" class="form-control" id="points_awarded" name="points_awarded" required>
                        <input type="hidden" class="form-control" id="exam_id" name="exam_id"  value="{{ $exam->id }}">
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </div>
            </div>
        </form>
    </div>
@endif
    <hr>

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Question</th>
                        <th scope="col">Options</th>
                        <th scope="col">Correct_answers</th>
                        <th scope="col">Points</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question  )

                    <tr>
                        <td>{{ $question->type }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->options }}</td>
                        <td>{{ $question->correct_answers }}</td>
                        <td>{{ $question->points_awarded }}</td>
                        <td>
                            <a href="{{ route('admin.exam.edit', ['id'=>$question->id]) }}">
                                <button class="btn btn-primary">
                                    <i class="bi-pencil"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.exam.delete', $question->id)}}" method="POST">
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




<script>
    {{ $question->question }}
    @if
    let question = @json($question)
    const questionTypeSelect = document.getElementById('type');
    const questionForm = document.getElementById('questionForm');
    // const correct_answer = document.getElementById('correct_answer');
        questionForm.innerHTML = `
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="options">Option1:</label>
                    <input type="radio"  name="correct_answers" value="a" >
                    <input type="text" class="form-control" name="option1" >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="options">Option2</label>
                    <input type="radio" name="correct_answers" value="b">
                    <input type="text" class="form-control" name="option2" >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="options">Option3</label>
                    <input type="radio" name="correct_answers" value="c">
                    <input type="text" class="form-control" name="option3" >
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="options">Option4</label>
                    <input type="radio" name="correct_answers" value="d">
                    <input type="text" class="form-control" name="option4" >
                </div>
            </div>
        </div>  `;
                // correct_answer.style.display = 'none';


        //     correct_answer.innerHTML = `
    //         <div class="form-group">
    //             <label for="correct_answers">Correct Answers :</label>
    //             <input type="text" class="form-control" id="correct_answers" name="correct_answers"  required>
    //         </div>
    //   `;

  questionTypeSelect.addEventListener('change', () => {
    const selectedQuestionType = questionTypeSelect.value;

    if (selectedQuestionType === 'multiple_choice') {
    //   const questionText = document.getElementById('questionText').textContent;
      const answerChoices = ['option1', 'option2', 'option3'];
  questionForm.innerHTML = `
        <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="options">Option1:</label>
                <input type="radio"  name="correct_answers" value="a">
                <input type="text" class="form-control" name="option1" >
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="options">Option2</label>
                <input type="radio" name="correct_answers" value="b">
                <input type="text" class="form-control" name="option2" >
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="options">Option3</label>
                <input type="radio" name="correct_answers" value="c">
                <input type="text" class="form-control" name="option3" >
            </div>
        </div>
        <div class="col">

            <div class="form-group">
                <label for="options">Option4</label>
                <input type="radio" name="correct_answers" value="d">
                <input type="text" class="form-control" name="option4" >
            </div>
        </div>

        </div>
        `;
        // correct_answer.style.display = 'none';
            //   <div class="form-group">
    //       <label for="correct_answers">Select the correct correct_answers:</label>
    //       <div class="form-check">
    //         <input class="form-check-input" type="radio" id="answer1" name="correct_answers" value="false" >
    //         <label class="form-check-label" for="answer1">option1</label>
    //       </div>
    //       <div class="form-check">
    //         <input class="form-check-input" type="radio" id="answer2" name="correct_answers"  value="false">
    //         <label class="form-check-label" for="answer2">option2</label>
    //       </div>
    //       <div class="form-check">
    //         <input class="form-check-input" type="radio" id="answer3" name="correct_answers" value="false">
    //         <label class="form-check-label" for="answer3">option1</label>
    //       </div>
    //     </div>

    } else if (selectedQuestionType === 'open_ended') {
    //     correct_answer.innerHTML = `
    //         <div class="form-group">
    //             <label for="correct_answers">Correct Answers :</label>
    //             <input type="text" class="form-control" id="correct_answers" name="correct_answers"  required>
    //         </div>
    //   `;

      questionForm.innerHTML = `
        <div class="form-group">
          <label for="options">Enter Answer:</label>
          <textarea id="options" class="form-control" name="correct_answers" rows="2"></textarea>
        </div>
      `;
    } else if (selectedQuestionType === 'true_false') {
    //     correct_answer.innerHTML = `
    //         <div class="form-group">
    //             <label for="correct_answers">Correct Answers :</label>
    //             <input type="text" class="form-control" id="correct_answers" name="correct_answers"  required>
    //         </div>
    //   `;
    // correct_answer.innerHTML = '';
      questionForm.innerHTML = `
        <div class="form-group" class="form-check-label">
            <label for="correct_answers">Select The Answer </label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="trueAnswer" name="correct_answers" >
                <label class="form-check-label" for="trueAnswer">True</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="falseAnswer" name="correct_answers" >
                <label class="form-check-label" for="falseAnswer">False</label>
            </div>
        </div>
            `;
          }
  });


  const isObjectEmpty = (objectName) => {
  return (
    objectName &&
    Object.keys(objectName).length === 0 &&
    objectName.constructor === Object
  );
};
          </script>


@endsection
