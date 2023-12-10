@extends('layouts.app')

@section('content')
<div class="container">

    <div id="dashboard">
  <nav class="nav nav-tabs" role="tablist">
    <a class="nav-link active" href="#upcoming-exams" id="upcoming-exams-tab">Upcoming Exams</a>
    <a class="nav-link" href="#past-results" id="past-results-tab">Past Results</a>
    <a class="nav-link" href="#performance-analytics" id="performance-analytics-tab">Performance Analytics</a>
  </nav>

  <div class="tab-content">
    <div class="tab-pane fade show active" id="upcoming-exams">
      <h2>Your Upcoming Exams</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Exam Title</th>
            <th>Date & Time</th>
            <th>Subject</th>
            <th>Instructor</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule )
            <tr>
                <td>{{ $schedule->exam->title }}</td>
                <td>{{ $schedule->date }}</td>
                <td>{{ $schedule->exam->subject }}</td>
                <td>{{ $schedule->exam->instructor->name }}</td>
                <td>{{ $schedule->active ? 'Yes' : 'No' }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <div class="tab-pane fade" id="past-results">
      <h2>Past Exam Results</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Exam Title</th>
            <th>Date & Time</th>
            <th>Score</th>
            <th>Subject</th>
            <th>Instructor</th>
          </tr>
        </thead>
        <tbody>
          </tbody>
      </table>
    </div>

    <div class="tab-pane fade" id="performance-analytics">
      <h2>Your Performance Analytics</h2>
      </div>
  </div>

  </div>

    {{-- <h2>User Dashboard</h2>

    <div class="row">
        <!-- Available Exams Panel -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Available Exams</h5>
                    <p class="card-text">You have 3 upcoming exams.</p>
                    <a href="{{ route('browes') }}" class="btn btn-primary">Browse Exams</a>
                </div>
            </div>
        </div>

        <!-- Exam Results Panel -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Exam Results</h5>
                    <p class="card-text">View your recent exam results and feedback.</p>
                    <a href="{{ route('result') }}" class="btn btn-primary">View Results</a>
                </div>
            </div>
        </div>

        <!-- Exam Scheduling Panel -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Exam Scheduling</h5>
                    <p class="card-text">Schedule your upcoming exams here.</p>
                    <a href="{{ route('schedule') }}" class="btn btn-primary">Schedule Exams</a>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}

@endsection
