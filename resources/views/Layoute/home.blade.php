<!DOCTYPE html>
<html  dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
    <title>Document</title>
</head>
<!-- <body>
    <h1>home page is here</h1>


</body> -->

<body>
    
    <div class="container-fluid mt-2">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">ّFood</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">خانه</a>
                  </li>
                  @if(Auth::user())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">خروج</a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">ورود</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                  </li>
                  @endif
           

                
           
                </ul>
              </div>
            </div>
          </nav>
        {{-- <div class="alert alert-primary">
            <div class="row">
                <a class="col-1" href="{{ route('home') }}">خانه</a>
            <a class="col-1" href="{{ route('login') }}">ورود</a>
            </div>
            
        </div> --}}
      
    </div>
    <div class="container">

        @yield('content')

    </div>
    
    
    <footer class="w-100 py-4 flex-shrink-0 mt-2" style="background-color: #e3f2fd;">
      <div class="container py-4">
          <div class="row gy-4 gx-5">
              <div class="col-lg-4 col-md-6">
                  <h5 class="h1 text-white">FB.</h5>
                  <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                  <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary" href="#">Bootstrapious.com</a></p>
              </div>
              <div class="col-lg-2 col-md-6">
                  <h5 class="text-white mb-3">Quick links</h5>
                  <ul class="list-unstyled text-muted">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Get started</a></li>
                      <li><a href="#">FAQ</a></li>
                  </ul>
              </div>
              <div class="col-lg-2 col-md-6">
                  <h5 class="text-white mb-3">Quick links</h5>
                  <ul class="list-unstyled text-muted">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Get started</a></li>
                      <li><a href="#">FAQ</a></li>
                  </ul>
              </div>
              <div class="col-lg-4 col-md-6">
                  <h5 class="text-white mb-3">Newsletter</h5>
                  <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                  <form action="#">
                      <div class="input-group mb-3">
                          <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                          <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </footer>
</body>
</html>