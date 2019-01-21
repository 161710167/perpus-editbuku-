<aside class="sidebar">
  @if(Auth::check())
  <div class="scrollbar-inner">
      <div class="user">
        <div class="user__info" data-toggle="dropdown">
          <img class="user__img" src="{{asset('demo/img/profile-pics/8.jpg')}}" alt="">
          <div>
            <div class="user__name">{{Auth::user()->name}}</div>
            <div class="user__email" style="font-size:10px;">{{Auth::user()->email}}</div>
          </div>
        </div>
        <div class="dropdown-menu">
          {{-- <a class="dropdown-item" href="#">View Profile</a>
          <a class="dropdown-item" href="#">Settings</a> --}}
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();$('#logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>

      <ul class="navigation">
        <li class="{{ Request::is('home') ? 'navigation__active' : '' }}"><a href="{{url('home')}}"><i class="zmdi zmdi-home"></i> Beranda</a></li>

          <li class="{{ Request::is('kelas') ? 'navigation__active' : '' }}"><a href="{{url('kelas')}}"><i class="zmdi zmdi-balance"></i> Kelas</a></li>

          <li class="{{ Request::is('buku') ? 'navigation__active' : '' }}"><a href="{{url('buku')}}"><i class="zmdi zmdi-book"></i>Buku</a></li>

          <li class="{{ Request::is('siswa') ? 'navigation__active' : '' }}"><a href="{{url('siswa')}}"><i class="zmdi zmdi-accounts"></i>Siswa</a></li>

          <li class="{{ Request::is('pinjam') ? 'navigation__active' : '' }}"><a href="{{url('pinjam')}}"><i class="zmdi zmdi-assignment"></i>Peminjaman Buku</a></li>

          <li class="{{ Request::is('pengembalian') ? 'navigation__active' : '' }}"><a href="{{url('pengembalian')}}"><i class="zmdi zmdi-assignment-check"></i>Pengembalian Buku</a></li>

          <li class="{{ Request::is('pengunjung') ? 'navigation__active' : '' }}"><a href="{{url('pengunjung')}}"><i class="zmdi zmdi-account"></i>Pengunujung</a></li>

          @php

          $active_parent_1 =Request::is('export/peminjaman') || 
                            Request::is('export/pengembalian') ||
                            Request::is('export/pengunjung') ||
                            Request::is('export/siswa') ? 'navigation__sub--active' : ''; 
          @endphp

          <li class="navigation__sub {{$active_parent_1}} navigation__sub--toggled">
          <a href="#"><i class="zmdi zmdi-download"></i> Unduh</a>
          <ul>
            <!-- <li class="{{ Request::is('export/peminjaman') ? 'navigation__active' : '' }}"><a href="{{url('export/peminjaman')}}">Laporan Peminjaman Buku</a></li> -->

            <li class="{{ Request::is('export/pengembalian') ? 'navigation__active' : '' }}"><a href="{{url('export/pengembalian')}}">Laporan Buku</a></li>

            <li class="{{ Request::is('export/pengunjung') ? 'navigation__active' : '' }}"><a href="{{url('export/pengunjung')}}">Laporan Pengunjung</a></li>

          </ul>   
        </li>
      </ul>
    </div>
    @endif
  </aside>

  