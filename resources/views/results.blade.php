@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Exam Results</h2>

    <!-- Results Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Question 1</td>
                <td>Your answer</td>
                <td>Correct answer</td>
                <td>Feedback and explanation</td>
            </tr>
            <!-- Add more rows for each question -->
        </tbody>
    </table>

    <!-- Charts or Visualizations (if applicable) -->
    <div class="chart-container">
        <!-- Add charts here -->
    </div>

    <!-- Explanation Modals -->
    <div class="modal fade" id="explanationModal" tabindex="-1" role="dialog" aria-labelledby="explanationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="explanationModalLabel">Explanation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Explanation content goes here -->
                    <p>Here's a detailed explanation of the correct answer for this question.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and jQuery script links here if needed -->

<!-- JavaScript to trigger modal -->
<script>
    $('#explanationModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var explanation = button.data('explanation');
        var modal = $(this);
        modal.find('.modal-body').html(explanation);
    });
</script>

@endsection
