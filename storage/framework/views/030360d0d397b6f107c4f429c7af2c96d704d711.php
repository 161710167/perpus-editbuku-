<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Perpustakaan | <?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Vendor styles -->
    <?php echo $__env->make('layouts.partial._styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
  </head>
  <body data-ma-theme="green">
    <main class="main">
      <?php echo $__env->make('layouts.partial._loader_page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('layouts.partial._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('layouts.partial._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <section class="content">
        <?php echo $__env->make('layouts.partial._notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.partial._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </section>
    </main>
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
    <?php echo $__env->make('layouts.partial._scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('plugin-scripts'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html>