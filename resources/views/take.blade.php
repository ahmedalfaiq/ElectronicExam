@extends('layouts.app')
@section('title','Exam Details')
@section('content')

<div id="exam-container">
  <h1>Exam {{ $exam->title }}</h1>
  <span id="timer">00:10:00</span>
  <ul id="questions"></ul>
  {{ $questions }}
  <button id="submit-exam">Submit Exam</button>
</div>

<script>
    // Function to shuffle questions
function shuffleQuestions(questions) {
  for (let i = questions.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [questions[i], questions[j]] = [questions[j], questions[i]]; // Swap elements
  }
  return questions;
}

// Get exam questions from backend or local storage
var examQuestion = @json($questions); // Your logic to fetch questions

// Shuffle questions before populating the list
var examQuestions = shuffleQuestions(examQuestion);

// Loop through each question and create HTML elements
var questionList = document.getElementById('questions');
examQuestions.forEach((question) => {
  let questionElement = document.createElement('li');
  questionElement.innerHTML = `
    <h4>${question.question}</h4>
    <ul>
      <li><input type="radio" name="${question.id}" value="${question.option1}"> ${question.option1}</li>
      <li><input type="radio" name="${question.id}" value="${question.option2}"> ${question.option2}</li>
      <li><input type="radio" name="${question.id}" value="${question.option3}"> ${question.option3}</li>
      <li><input type="radio" name="${question.id}" value="${question.option4}"> ${question.option4}</li>
    </ul>
  `;
  questionList.appendChild(questionElement);
});

// Implement automated grading based on question type and selected options
function gradeExam(examQuestions) {
  let score = 0;
  examQuestions.forEach((question) => {
    const selectedOption = document.querySelector(`input[name="${question.id}"]:checked`);
    if (selectedOption) { // Check if an option is selected
      if (question.type === 'multiple_choice' && selectedOption.value === question.correct_answer) {
        score++;
      } else if (question.type === 'true_false' && selectedOption.value === question.correct_answer.toLowerCase()) {
        score++;
      }
    }
  });
  return score;
}

// Submit exam button click event
const submitButton = document.getElementById('submit-exam');
submitButton.addEventListener('click', () => {
  const finalScore = gradeExam(examQuestions);
  // Submit score to backend or display it on the page
  alert(`Exam submitted! Your score is ${finalScore}/${examQuestions.length}`);
});

</script>
@endsection

{{-- @extends('layouts.app')
@section('title','Exam Details')
@section('content')
<div class="container">
    <h2>Math Exam</h2>
    <p>Remaining Time: <span id="timer">60:00</span></p>

    <!-- Question 1 -->
    <div class="question">
        <h4>Question 1:</h4>
        <p>What is 2 + 2?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question1" id="option1" value="option1">
            <label class="form-check-label" for="option1">
                3
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="question1" id="option2" value="option2">
            <label class="form-check-label" for="option2">
                4
            </label>
        </div>
        <!-- Add more answer options as needed -->

        <!-- Navigation Controls -->
        <button class="btn btn-primary" id="prevButton">Previous</button>
        <button class="btn btn-primary" id="nextButton">Next</button>
    </div>

    <!-- Question 2 (Repeat structure for each question) -->

    <!-- Submit Button -->
    <button class="btn btn-success" id="submitButton">Submit Exam</button>
</div>
    <!-- Add JavaScript to implement the timer (countdown) -->
    <script>
        const timer = document.getElementById("timer");
        let timeLeft = 3600; // 60 minutes in seconds

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timer.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            if (timeLeft > 0) {
                timeLeft--;
                setTimeout(updateTimer, 1000);
            }
        }

        updateTimer();
    </script>

@endsection --}}
