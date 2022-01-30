<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <livewire:styles />

<nav class="nav">
     <a class="nav-link" href="{{ url('/') }}">Dashboard</a>
     <a class="nav-link" href="{{ route('register') }}">Register</a>
    <a class="nav-link" href="{{ route('login') }}">Login</a>
</nav>
