@extends('default')

@section('css')
  <style>
    .hero {
      background: #f8f9fa;
      padding: 100px 0;
      text-align: center;
    }
    .features {
      padding: 60px 0;
    }
    .cta {
      background-color: #0d6efd;
      color: white;
      padding: 60px 0;
      text-align: center;
    }
    .cta a.btn {
      background-color: white;
      color: #0d6efd;
      border: none;
    }
  </style>
@endsection

@section('content')
  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1 class="display-4">Welcome to Our Website</h1>
      <p class="lead">We provide solutions that help you grow your business.</p>
      <a href="javascript:void(0);" class="btn btn-primary btn-lg mt-3">Learn More</a>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="features">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4">
          <h3>Feature One</h3>
          <p>Short description of the feature. Explain why it matters.</p>
        </div>
        <div class="col-md-4">
          <h3>Feature Two</h3>
          <p>Short description of the feature. Highlight its benefits.</p>
        </div>
        <div class="col-md-4">
          <h3>Feature Three</h3>
          <p>Short description of the feature. Make it appealing.</p>
        </div>
      </div>
    </div>
  </section>
@endsection
