<?php
include 'connection1.php';
$koneksi1 = mysqli_connect("localhost", "root", "" , "dashboard");
session_start();


if (isset($_POST['Login'])) {
 $username = $_POST['username'];
 $password = $_POST['password'];
 $Login = mysqli_query($koneksi1, "SELECT * from user where username='$username' and password='$password'");
 
 if (mysqli_num_rows($Login) > 0){
  $data = mysqli_fetch_assoc($Login);
  if ($data['role'] == "admin"){
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
  } elseif ($data['role'] == "pelanggan"){
    $_SESSION['user'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['hp'] = $data['hp'];
    $_SESSION['alamat'] = $data['alamat'];
    $_SESSION['id_user'] = $data['id'];

    header("Location: profil-pelanggan.php");
  }
 } else {
  echo "Username dan Password salah";
  header("Location: login-user.php");
 }



  if ($data = mysqli_fetch_array($Login)){
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['hp'] = $data['hp'];
    $_SESSION['alamat'] = $data['alamat'];
    $_SESSION['id_user'] = $data['id'];
    header('location: K-SHOP.php');
     } else{
      header('login-user.php');
     }
}
 

?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Log In User Kei's Online Shop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/modals/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>


<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2">Login</h1>
        <button type="button" name="Login" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form action="" method="post">
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">password</label>
          </div>
  </footer>
  
  <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="Login" type="submit">Login</button>
          <small class="text-body-secondary">don't have an account?<a href="signin.php">sign up</a></small>
          <hr class="my-4">
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>