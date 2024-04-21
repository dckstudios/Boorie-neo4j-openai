<html>
<title>Boorie</title>
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>
  .body-style {background-image: linear-gradient(315deg, #f39f86 0%, #f9d976 74%); padding:25px;}
</style>
<body class="body-style">
<section >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="/images/logo_boorie.png" alt="Boorie Logo" width="175" height="57">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">create your account</h2>
            <form  method="GET" action="{{ route('usuarios.register') }}">
              <div class="row gy-2 overflow-hidden">
              <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" placeholder="Username" required>
                    <label for="text" class="form-label">Username</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="mailUsuario" id="mailUsuario" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="passwordUsuario" id="passwordUsuario" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit">Sign Up</button>
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