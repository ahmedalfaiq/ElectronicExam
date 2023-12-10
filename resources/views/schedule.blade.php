@extends('layouts.app')
@section('title','Scheduling')
@section('content')
<div class="container">

    <h2>Exam Scheduling</h2>

    <!-- Exam Cards - Repeat for each exam -->
    @if (isset($exam))
    <div class="row">
        {{-- <div class="col-md-4">
        </div> --}}


        <div class="col-md-8">
            <div class="card mb-4 " style="width: 100%;height: 80vh;">
                <img src="{{ asset('/storage/exam/'.$exam["image"]) }}" class="card-img-top rounded "  height="300px" alt="...">
                <div class="card-body">

                    <div class="d-flex flex-row">
                        <h5 class="card-title px-2">Title:  {{ $exam->title }} </h5>
                        <p class="card-title px-2 bd-highlight">Subject: {{ $exam->subject }}</p>
                    </div>
                    <div class="d-flex flex-row">
                        <p class="card-text px-2 bd-highlight">Instructor: {{ $exam->instructor->name }}</p>
                        <p class="card-text px-2 bd-highlight">Department: {{ $exam->dept->name }}</p>
                        <p class="card-text px-2 bd-highlight">Level: {{ $exam->level->name }}</p>
                    </div>
                    <div class="d-flex flex-row">
                        <p class="card-text px-2 bd-highlight">Active: {{ $exam->active ? 'Yes' : 'No' }}</p>
                        {{-- <p class="card-text px-2 bd-highlight"></p> --}}
                        <p class="card-text px-2 bd-highlight">Duration: {{ $exam->duration }}</p>
                    </div>
                    <div class="d-flex flex-row">
                        <p class="card-text px-2 bd-highlight">Start Date/Time: {{ $exam->start_datetime }}</p>
                        <p class="card-text px-2 bd-highlight">End Date/Time:: {{ $exam->start_datetime }}</p>
                    </div>

                    <form method="POST" action="{{ route('schedule.store')  }}" enctype="multipart/form-data" >
                        @csrf

                        <label for="examTime"  class="form-label px-2">Select Exam Time:</label><br>
                        <div class="input-group ">
                            <input type="hidden" name="student_id"  value="2">
                            <input type="hidden" name="exam_id"  value="{{ $exam->id }}">
                            <input type="checkbox" name="Action"  >
                            <input type="datetime-local" id="examTime" name="date" class="form-control" required aria-label="Recipient's username with two button addons">
                            <input class="btn btn-outline-secondary" type="submit" value="Schedule Exam" id="scheduleButton">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        @endif
    </div>


    {{-- <!-- Date Picker -->
    <div class="mb-3">
        <label for="examDate">Select Exam Date:</label>
        <input type="date" id="examDate" class="form-control">
    </div>

    <!-- Time Picker (if needed) -->
    <div class="mb-3">
        <label for="examTime">Select Exam Time:</label>
        <input type="time" id="examTime" class="form-control">
    </div> --}}

    <!-- Schedule Button -->
    {{-- <button id="scheduleButton" class="btn btn-primary">Schedule Exam</button> --}}

    <!-- Alerts for Confirmations and Reminders -->
    <div class="alert alert-success mt-3" id="confirmationAlert" style="display: none;">
        <strong>Exam Scheduled!</strong> You have successfully scheduled the exam. A confirmation email has been sent.
    </div>

    <!-- Modal for Reminders -->
    <div class="modal fade" id="reminderModal" tabindex="-1" role="dialog" aria-labelledby="reminderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reminderModalLabel">Exam Reminder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your scheduled exam is tomorrow. Don't forget to prepare!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and jQuery script links here if needed -->

<!-- JavaScript to handle scheduling and reminders -->
<script>
    // Scheduling Button Click Event
    document.getElementById('scheduleButton').addEventListener('click', function() {
        // Perform scheduling logic here

        // Show the confirmation alert
        document.getElementById('confirmationAlert').style.display = 'block';

        // Show the reminder modal
        $('#reminderModal').modal('show');
    });
</script>

@endsection
