<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-chevron-double-left"></span>
      </button>
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets_pluginAdmin/images/logo-mini.svg') }}" alt="logo" /></a>
      </div>
      <ul class="navbar-nav">
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-email-outline"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <h6 class="p-3 mb-0 font-weight-semibold">Messages</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{ asset('assets_pluginAdmin/images/faces/face1.jpg') }}" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                <p class="text-gray mb-0"> 1 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{ asset('assets_pluginAdmin/images/faces/face6.jpg') }}" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                <p class="text-gray mb-0"> 15 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="{{ asset('assets_pluginAdmin/images/faces/face7.jpg') }}" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                <p class="text-gray mb-0"> 18 Minutes ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <h6 class="p-3 mb-0 text-center text-primary font-13">4 new messages</h6>
          </div>
        </li> --}}
        {{-- <li class="nav-item dropdown ml-3">
          <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="mdi mdi-calendar"></i>
                </div>
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject font-weight-normal mb-0">New order recieved</h6>
                <p class="text-gray ellipsis mb-0"> 45 sec ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-warning">
                  <i class="mdi mdi-settings"></i>
                </div>
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject font-weight-normal mb-0">Server limit reached</h6>
                <p class="text-gray ellipsis mb-0"> 55 sec ago </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-info">
                  <i class="mdi mdi-link-variant"></i>
                </div>
              </div>
              <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                <h6 class="preview-subject font-weight-normal mb-0">Kevin karvelle</h6>
                <p class="text-gray ellipsis mb-0"> 11:09 PM </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
          </div>
        </li> --}}
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        {{-- <li class="nav-item nav-logout d-none d-md-block mr-3">
          <a class="nav-link" href="#">Status</a>
        </li>
        <li class="nav-item nav-logout d-none d-md-block">
          <button class="btn btn-sm btn-danger">Trailing</button>
        </li> --}}
        <li class="nav-item nav-profile dropdown d-none d-md-block">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-text">{{ session('user')->USERNAME ?? session()->get('user-data')['nama'] }}</div>
          </a>
          <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" data-toggle="modal" data-target="#editProfileModal">
               Profil </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
               Ubah Password </a>
            <div class="dropdown-divider"></div>
            @php
    $userData = session()->get('user-data');
@endphp

@if ($userData && array_key_exists('nama', $userData) && $userData['nama'] !== null)
            <a class="dropdown-item" href="{{ route('kemenkeu-id.logout') }}">Logout</a>  
            @else
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout </a>   
            @endif
            
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>           
        </li>
        <li class="nav-item nav-logout d-none d-lg-block">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="mdi mdi-home-circle"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ session('user')->USERNAME ?? session()->get('user-data')['nama'] }}" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ session('user')->EMAIL ?? session()->get('user-data')['nama'] }}" required>
                    </div> --}}
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>