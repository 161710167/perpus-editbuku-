<aside class="sidebar">
  <?php if(Auth::check()): ?>
  <div class="scrollbar-inner">
      <div class="user">
        <div class="user__info" data-toggle="dropdown">
          <img class="user__img" src="<?php echo e(asset('demo/img/profile-pics/8.jpg')); ?>" alt="">
          <div>
            <div class="user__name"><?php echo e(Auth::user()->name); ?></div>
            <div class="user__email" style="font-size:10px;"><?php echo e(Auth::user()->email); ?></div>
          </div>
        </div>
        <div class="dropdown-menu">
          
          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
              onclick="event.preventDefault();$('#logout-form').submit();">
              <?php echo e(__('Logout')); ?>

          </a>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
          </form>
        </div>
      </div>

      <ul class="navigation">
        <li class="<?php echo e(Request::is('home') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('home')); ?>"><i class="zmdi zmdi-home"></i> Beranda</a></li>

          <li class="<?php echo e(Request::is('kelas') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('kelas')); ?>"><i class="zmdi zmdi-balance"></i> Kelas</a></li>

          <li class="<?php echo e(Request::is('buku') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('buku')); ?>"><i class="zmdi zmdi-book"></i>Buku</a></li>

          <li class="<?php echo e(Request::is('siswa') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('siswa')); ?>"><i class="zmdi zmdi-accounts"></i>Siswa</a></li>

          <li class="<?php echo e(Request::is('pinjam') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('pinjam')); ?>"><i class="zmdi zmdi-assignment"></i>Peminjaman Buku</a></li>

          <li class="<?php echo e(Request::is('pengembalian') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('pengembalian')); ?>"><i class="zmdi zmdi-assignment-check"></i>Pengembalian Buku</a></li>

          <li class="<?php echo e(Request::is('pengunjung') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('pengunjung')); ?>"><i class="zmdi zmdi-account"></i>Pengunujung</a></li>

          <?php

          $active_parent_1 =Request::is('export/peminjaman') || 
                            Request::is('export/pengembalian') ||
                            Request::is('export/pengunjung') ||
                            Request::is('export/siswa') ? 'navigation__sub--active' : ''; 
          ?>

          <li class="navigation__sub <?php echo e($active_parent_1); ?> navigation__sub--toggled">
          <a href="#"><i class="zmdi zmdi-download"></i> Unduh</a>
          <ul>
            <!-- <li class="<?php echo e(Request::is('export/peminjaman') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('export/peminjaman')); ?>">Laporan Peminjaman Buku</a></li> -->

            <li class="<?php echo e(Request::is('export/pengembalian') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('export/pengembalian')); ?>">Laporan Buku</a></li>

            <li class="<?php echo e(Request::is('export/pengunjung') ? 'navigation__active' : ''); ?>"><a href="<?php echo e(url('export/pengunjung')); ?>">Laporan Pengunjung</a></li>

          </ul>   
        </li>
      </ul>
    </div>
    <?php endif; ?>
  </aside>

  