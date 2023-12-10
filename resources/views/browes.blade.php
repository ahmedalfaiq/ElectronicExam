@extends('layouts.app')
@section('title','Available Exams')
@section('content')
<div class="container">
    <h2>Exam Catalog</h2>
    <!-- Search and Filter Form -->
    <form class="mb-4">
        <div class="row">
            {{-- <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search exams">
            </div> --}}
            <div class="col-md-3">
                <select class="form-select">
                    <option value="" disabled selected>Select Department</option>
                    <option value="math">Math</option>
                    <option value="science">Science</option>
                    <!-- Add more department options as needed -->
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </div>
        </div>
    </form>

    <!-- Exam Cards - Repeat for each exam -->
    <div class="row">
        @foreach ($exams as $exam )
        <div class="col-md-4">
            <div class="card mb-4 " style="width: 28rem;">
                 <img src="{{ asset('/storage/exam/'.$exam["image"]) }}" class="card-img-top" width="28rem" height="150px" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $exam->title }} </h5>
                    {{-- <p class="card-text">{{ $exam->subject }}</p> evenly - around --}}
                    <div class="d-flex flex-row justify-content-between">
                        <p class="card-text px-2 bd-highlight">Subject: {{ $exam->subject }}</p>
                        <p class="card-text px-2 bd-highlight">Duration: {{ $exam->duration }}</p>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <p class="card-text px-2 bd-highlight">Date: {{ $exam->start_datetime }}</p>
                        <p class="card-text px-2 bd-highlight">End Date: {{ $exam->start_datetime }}</p>

                    </div>
                    <div class="d-flex justify-content-between">

                        <a href="{{ route('take',[$exam->id]) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('schedule',[$exam->id]) }}" class="btn btn-primary">Schedule</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


{{-- <div class="container">
    <div class="row">
        <div class="card">
            <h2>Mathematics Exam</h2>
            <p>Date: October 20, 2023</p>
            <a href="exam-details.html">View Details</a>
        </div>
        <div class="card">
            <h2>Science Exam</h2>
            <p>Date: November 5, 2023</p>
            <a href="exam-details.html">View Details</a>
        </div>
    </div>
</div> --}}


@endsection
