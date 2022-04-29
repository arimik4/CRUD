<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<!-- font awesome -->
     <link rel="stylesheet" href="fontawesome-free/css/all.min.css">


    <!--castom css-->
    <link rel="stylesheet" type="text/css" href="style.css">

   
   <!-- Dependencies sweet alert -->
   <script src="sweetalert2/sweetalert2.all.min.js"></script>

    <title>Login</title>
  </head>
  <body>
   <main>
     <div class="global-container">
        <div class="d-flex justify-content-center pt-5">
            <div class="card border-0 shadow-sm rounded-0 mt-5" style="width: 400px;">

                <div class="card-header border-0 bg-info bg-dark">
                    <h1 class="card-title text-center">
                        L O G I N
                    </h1>
                </div>
                <div class="card-body p-4 bg-dark">
                    <form action="login_action.php" method="post">
                        <div class="form-floating mb-5 mt-4">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-5 mt-4">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password Anda" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-block btn-info">
                                Sign in
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
  <!-- Javascript -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>               
  </body>

  <!-- alert jika login gagal -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'gagal') : ?>
    <script>
        swal.fire({
            title: "Failed!",
            text: "Login Gagal!",
            icon: "error",
            button: false,
            timer: 2000
        });
    </script>
<?php endif; ?>
<!-- akhir alert login gagal -->
<!-- alert jika logout -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'logout') : ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "Logout Berhasil!",
            icon: "success",
            button: false,
            timer: 2000
        });
    </script>
<?php endif; ?>
<!-- akhir alert logout -->


</html>