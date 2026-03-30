<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @yield('css')
</head>

<body>

  <!-- Navbar -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item me-3">
            <select id="loginSelect" class="form-select">
              <option value="">Login As...</option>
              <option value="{{ route('admin.dashboard') }}">Admin</option>
            </select>
          </li>
          <li class="nav-item">
            <button id="goLogin" class="btn btn-primary">Go</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  @yield('content')

  <!-- Footer -->
  <footer class="text-center py-4">
    <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
  </footer>
  @yield('js')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const select = document.getElementById('loginSelect');
      const button = document.getElementById('goLogin');

      button.addEventListener('click', function () {
        const url = select.value;
        if (url) {
          window.location.href = url;
        } else {
          alert('Please select a login type.');
        }
      });
    });
  </script>


</body>

</html>