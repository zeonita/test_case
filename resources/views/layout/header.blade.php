<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-light">Majoo Teknologi Indonesia</span>
    @if(!auth()->user())
      <div class="d-flex">
        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
      </div>
    @endif
  </div>
</nav>