<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- css links -->
   @include('js_and_css_links.css_links')
</head>

<body>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
                 @if(session('error'))
                  <div class="alert alert-danger w-100">
                    {{ session('error')}}
                  </div>
                  @endif
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                  </div>

                  <form class="row g-3" action="{{ route('signin')}}" method="post">
                       @csrf
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                        <input type="text" value="{{ old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                         @error('email')
                          <span class="text-danger">
                           {{ $message}}
                          </span>
                         @enderror
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                          <span class="text-danger">
                           {{ $message}}
                          </span>
                         @enderror
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">You have no account? <a href="{{ route('register')}}">Register</a></p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
 <!-- End #main -->

  <!-- js links -->
  @include('js_and_css_links.js_links')
</body>

</html>