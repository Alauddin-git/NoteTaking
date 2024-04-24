<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Include Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="container-fluid py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-50 mb-5">Please enter your login and password!</p>
                        <form class="form" action="{{ route('login.operation') }}" method="post">
                            <div class="form-outline mb-4">
                                <input type="email" placeholder="Email Address" class="form-control form-control-lg">
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" placeholder="Password" class="form-control form-control-lg">
                            </div>
                            <div class="form-outline mb-4 d-grid gap-2">
                                <button type="submit" class="btn btn-info">Login </button>
                            </div>
                            <div>
                                <p class="mb-2"> Don't have an account? <a class="text-white-50 fw-bold"
                                        href="{{ url('/register') }}">Sign up</a></p>
                            </div>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Include Toastr JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('error'))
            toastr.error('{{ session('error') }}');
        @endif
    });
</script></body>

</html>
