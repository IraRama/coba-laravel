<nav class="nav-menu d-none d-lg-block">
    <ul>
      <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/', []) }}">Beranda</a></li>
      <li class="{{ request()->is('form-daftar') ? 'active' : '' }}"><a href="{{ url('form-daftar', []) }}">Pendaftaran</a></li>
      
      @if (\Auth::guard('mahasiswa')->check())
      <li class="{{ request()->is('mahasiswa/beranda') ? 'active' : '' }}">
        <a href="{{ url('mahasiswa/beranda', []) }}">Beranda Mahasiswa</a>
      </li>    
      @else
      <li class="{{ request()->is('form-login') ? 'active' : '' }}">
        <a href="{{ url('form-login', []) }}">Login</a>
      </li>
      @endif
      
      @if (\Auth::guard('mahasiswa')->check())      
      <li><a href="{{ url('logout', []) }}">Logout</a></li>
      @endif

    </ul>
  </nav><!-- .nav-menu -->
