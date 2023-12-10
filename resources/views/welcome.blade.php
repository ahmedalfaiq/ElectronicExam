@extends('layouts.app')
@section('content')
<div class="container-floud">
<header class="hero p-5 text-center bg-primary text-white">
    <img src="images/online_exam.png" alt="Online Exam" class="img-fluid mb-3 rounded-circle" style="width: 150px;">
    <h1>Electronic Test Site</h1>
    <p class="lead">A secure and convenient platform for taking exams online.</p>
  </header>

  <section class="features container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <i class="fas fa-lock fa-2x mb-3"></i>
        <h5>Enhanced Security</h5>
        <p>Secure login, encrypted data, and anti-cheating measures for peace of mind.</p>
      </div>
      <div class="col">
        <i class="fas fa-calendar-alt fa-2x mb-3"></i>
        <h5>Flexible Scheduling</h5>
        <p>Choose exam dates and times that fit your busy schedule.</p>
      </div>
      <div class="col">
        <i class="fas fa-file-alt fa-2x mb-3"></i>
        <h5>Seamless Administration</h5>
        <p>Instructors can easily create, manage, and grade exams.</p>
      </div>
    </div>
  </section>

  <section class="cta p-5 text-center bg-light">
    <a href="login.html" class="btn btn-primary btn-lg">Log In</a>
    <a href="register.html" class="btn btn-outline-primary btn-lg">Sign Up</a>
  </section>
    {{-- <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="head">Welcome to Our Exam Platform</h1>
                    <p class="subtitle">An Online Solution for Conducting Exams and Assessments</p>
                    <p>Unlock a Seamless Exam Experience with Enhanced Security and Flexibility</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Log In</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
    </header>

    <!-- About Us Section -->
    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>Our platform offers a wide range of electronic exams for students and teachers to improve the exam experience.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="key-features">
        <div class="container">
            <h2>Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <h3>Practice Exams</h3>
                        <p>Access a variety of practice exams to improve your skills.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fa fa-calendar"></i>
                        <h3>Exam Scheduling</h3>
                        <p>Flexible exam scheduling that suits your preferences and availability.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fa fa-book"></i>
                        <h3>Study Materials</h3>
                        <p>Explore study materials and resources to help you prepare.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>


</div> --}}
@endsection
