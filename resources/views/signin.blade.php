<html>
<title>Boorie</title>
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<style>
  .body-style {background:url('http://cdn.wallpapersafari.com/13/6/Mpsg2b.jpg');background-size: 100% 110%; padding:120px;}
</style>
<body class="body-style">
<section >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="animate__animated animate__zoomIn animate__slow card border border-light-subtle rounded-3 shadow-sm">
          <div style="box-shadow:10px 10px 22px rgba(0, 0, 0, 0.2);" class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="{{ url('/') }}">
                <img src="/images/logo_boorie.png" alt="Boorie Logo" width="175" height="57">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>
            <form action="{{ route('usuarios.login') }}">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="mailUsuario" id="mailUsuario" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">Log in</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Don't have an account? <a href="{{ url('usuarios/signup') }}" class="link-primary text-decoration-none">Sign up</a></p>
                </div>
              </div>
            </form>
        </div>

        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>