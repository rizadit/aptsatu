<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile border-bottom">
        <a href="#" class="nav-link flex-column">
          <div class="nav-profile-image">
            <img src="{{ asset('assets_pluginAdmin/images/faces/face1.jpg') }}" alt="profile" />
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex ml-0 mb-3 flex-column"> 
            @auth
            <span class="font-weight-semibold mb-1 mt-2 text-center">{{ Auth::user()->username }}</span>
            {{-- <span class="text-secondary icon-sm text-center">$3499.00</span> --}}
            @endauth
          </div>
        </a>
      </li>
      <li class="pt-2 pb-1">
        <span class="nav-item-head">Menu</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-clipboard-text menu-icon"></i>
          <span class="menu-title">Data Pengguna</span>          
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-pencil-box-outline menu-icon"></i>
          <span class="menu-title">Detail Pengguna</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('input') }}">
          <i class="mdi mdi-playlist-plus menu-icon"></i>
          <span class="menu-title">Input Data Layanan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-message-text-outline menu-icon"></i>
          <span class="menu-title">Survei Kepuasan</span>
        </a>
      </li>
      @if(Auth::check() && !in_array(Auth::user()->role, ['petugas', 'kantor']))
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-file-chart menu-icon"></i>
          <span class="menu-title">Dashboad & Laporan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-clipboard-outline menu-icon"></i>
          <span class="menu-title">Quality Assurance</span>
        </a>
      </li> 
      @endif     
    </ul>
  </nav>