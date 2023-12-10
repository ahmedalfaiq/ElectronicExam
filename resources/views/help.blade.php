@extends('layouts.app')
@section('title','Help and Support')
@section('content')
<div class="container">
    <h2>Help and Support</h2>

    <!-- FAQs Section (Using Bootstrap Accordion) -->
    <div id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqQuestion1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqAnswer1" aria-expanded="true" aria-controls="faqAnswer1">
                    How do I schedule an exam?
                </button>
            </h2>
            <div id="faqAnswer1" class="accordion-collapse collapse show" aria-labelledby="faqQuestion1">
                <div class="accordion-body">
                    To schedule an exam, follow these steps...
                </div>
            </div>
        </div>
        <!-- Add more FAQ items as needed -->
    </div>

    <!-- Contact Support Form -->
    <div class="mt-4">
        <h3>Contact Support</h3>
        <form>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection
