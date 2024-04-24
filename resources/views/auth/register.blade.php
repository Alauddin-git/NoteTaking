<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Register</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head>

<body>
 <div class="container-fluid py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
   <div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card bg-dark text-white" style="">
     <div class="card-body p-5 text-center">
      <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
      <p class="text-white-50 mb-5">Please enter your Information to Register</p>
      <form class="form" action="{{ route('register.operation') }}" method="post">
        @csrf
       <div class="form-outline mb-4">
        <input type="text" name="user_name" value="{{ old('user_name') }}" placeholder="User Name" class="form-control form-control-lg"> </div>
       <div class="form-outline mb-4">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" class="form-control form-control-lg"> </div>
       <div class="form-outline mb-4">
        <input type="password" name="password" placeholder="Password" class="form-control form-control-lg"> </div>
       <div class="form-outline mb-4">
        <input type="password" name="password_confirmation" placeholder="Conform Password" class="form-control form-control-lg"> </div>
       <div class="form-outline mb-4 d-grid gap-2">
        <button type="submit" class="btn btn-info">Register </button>
       </div>
       <div>
        <p class="mb-2"> Have an account? <a class="text-white-50 fw-bold" href="{{ url('/') }}">Sign in</a></p>
       </div>
       <hr class="my-4"> </form>
     </div>
    </div>
   </div>
  </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>

</html>