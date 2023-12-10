@extends('layouts.app')
@section('title','Additional Features')
@section('content')
<div class="container">
    <h2>Additional Features</h2>

    <!-- Leaderboard Section (Using Bootstrap Table) -->
    <div class="mb-4">
        <h3>Leaderboard</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>95</td>
                </tr>
                <!-- Add more rows for leaderboard entries -->
            </tbody>
        </table>
    </div>

    <!-- Study Materials Section (Using Bootstrap Accordion) -->
    <div class="mb-4">
        <h3>Study Materials</h3>
        <div id="studyMaterialsAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="material1Heading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#material1Collapse" aria-expanded="true" aria-controls="material1Collapse">
                        Study Material 1
                    </button>
                </h2>
                <div id="material1Collapse" class="accordion-collapse collapse show" aria-labelledby="material1Heading">
                    <div class="accordion-body">
                        Description and download link for Study Material 1.
                    </div>
                </div>
            </div>
            <!-- Add more study materials as needed -->
        </div>
    </div>

    <!-- Progress Tracking Section (Using Bootstrap Progress Bars) -->
    <div class="mb-4">
        <h3>Progress Tracking</h3>
        <div class="mb-3">
            <label for="progressBar1">Module 1 Progress</label>
            <div class="progress">
                <div class="progress-bar" id="progressBar1" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
            </div>
        </div>
        <!-- Add more progress bars for different modules or sections -->
    </div>
</div>

@endsection
