
<html lang="en">
  <!-- Mirrored from byrushan.com/projects/material-admin/app/2.1/jquery/bs4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Apr 2018 07:07:57 GMT -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/bower_components/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.css')); ?>">
    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.min.css')); ?>">
    <style>
      body {
        background-image:url('/img/bg.jpg');
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center;
      }
    </style>
  </head>
  <body data-ma-theme="green">
    <div class="login">
      <!-- Login -->
      <div class="login__block active" id="l-login">
        <div class="login__block__header">
          <i class="zmdi zmdi-account-circle"></i>
          Silahkan untuk masuk.
          <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
              <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-register" href="#">Buat Akun</a>
                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-forget-password" href="#">Lupa Password?</a>
              </div>
            </div>
          </div>
        </div>
        <form action="<?php echo e(route('login')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="login__block__body">
            <div class="form-group form-group--float form-group--centered">
              <input type="text" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
              <label>Email</label>
              <i class="form-group__bar"></i>
            </div>
            <div class="form-group form-group--float form-group--centered">
              <input type="password" name="password" class="form-control">
              <label>Kata Sandi</label>
              <i class="form-group__bar"></i>
            </div>
            <button  type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
          </div>
        </form>
      </div>
      <!-- Register -->
      <div class="login__block" id="l-register">
        <div class="login__block__header palette-Blue bg">
          <i class="zmdi zmdi-account-circle"></i>
          Buat Akun
          <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
              <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-login" href="#">Sudah Mempunyai Akun?</a>
                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-forget-password" href="#">Lupa Password?</a>
              </div>
            </div>
          </div>
        </div>
        <form action="<?php echo e(route('register')); ?>" method="POST" id="registrasi">
          <?php echo csrf_field(); ?>
          <div class="login__block__body">
            <div class="form-group form-group--centered">
              <input type="text" name="name" class="form-control" placeholder="Nama">
              
            </div>
            <div class="form-group form-group--centered">
              <input type="text" name="email" class="form-control" placeholder="Email">
              
            </div>
            <div class="form-group form-group--centered">
              <input type="password" name="password" class="form-control" placeholder="Password">
              
            </div>
            <div class="form-group form-group--centered">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
              
            </div>
            <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-check"></i></button>
          </div>
        </form>
      </div>
      <!-- Forgot Password -->
      <div class="login__block" id="l-forget-password">
        <div class="login__block__header palette-Purple bg">
          <i class="zmdi zmdi-account-circle"></i>
          Forgot Password?
          <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
              <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-login" href="#">Sudah Mempunyai Akun?</a>
                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-register" href="#">Buat Akun</a>
              </div>
            </div>
          </div>
        </div>
        <div class="login__block__body">
          <p class="mt-4">Jangan Cemas Akun anda bisa pulih.</p>
          <div class="form-group">
            <input type="text" class="form-control">
            <label>Email Address</label>
          </div>
          <button href="index-2.html" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-check"></i></button>
        </div>
      </div>
    </div>
    <!-- Older IE warning message -->
    <!--[if IE]>
    <div class="ie-warning">
      <h1>Warning!!</h1>
      <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>
      <div class="ie-warning__downloads">
        <a href="http://www.google.com/chrome">
        <img src="img/browsers/chrome.png" alt="">
        </a>
        <a href="https://www.mozilla.org/en-US/firefox/new">
        <img src="img/browsers/firefox.png" alt="">
        </a>
        <a href="http://www.opera.com">
        <img src="img/browsers/opera.png" alt="">
        </a>
        <a href="https://support.apple.com/downloads/safari">
        <img src="img/browsers/safari.png" alt="">
        </a>
        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
        <img src="img/browsers/edge.png" alt="">
        </a>
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
        <img src="img/browsers/ie.png" alt="">
        </a>
      </div>
      <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Javascript -->
    <!-- Vendors -->
    <script src="<?php echo e(asset('vendors/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bower_components/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.js')); ?>"></script>
    <!-- App functions and actions -->
    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
    <script>
      <?php if($errors->any()): ?>
        swal({
          type: 'error',
          title: 'Oops...',
          text: 'Email Atau Password Anda Salah',
          showConfirmButton: false,
        })
    <?php endif; ?>
    </script>
    <?php echo JsValidator::formRequest('App\Http\Requests\RegisterStore', '#registrasi'); ?>

    <!-- Mirrored from byrushan.com/projects/material-admin/app/2.1/jquery/bs4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Apr 2018 07:07:57 GMT -->
  </body>
</html>