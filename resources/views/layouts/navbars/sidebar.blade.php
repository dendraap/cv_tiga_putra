<div class="sidebar" data-color="cvtigaputra" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <div class="logo">
    <a href="/home.html" class="simple-text logo-normal" target="_blank">
      {{ __('CV Tiga Putra') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
            <i class="material-icons">admin_panel_settings</i>
            <p>{{ __('Manage') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse show" id="laravelExample">
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                  <span class="sidebar-mini"> MA </span>
                  <span class="sidebar-normal">{{ __('Profile') }} </span>
                </a>
              </li>

              @if(Auth::user()->role == 'Admin')
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="/user">
                  <span class="sidebar-mini"> ME </span>
                  <span class="sidebar-normal"> {{ __('Manage User') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                <a class="nav-link" href="/roles">
                  <span class="sidebar-mini"> MR </span>
                  <span class="sidebar-normal"> {{ __('Manage Roles') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
                <a class="nav-link" href="/products">
                  <span class="sidebar-mini"> MP </span>
                  <span class="sidebar-normal"> {{ __('Manage Products') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'dropshippers' ? ' active' : '' }}">
                <a class="nav-link" href="/dropshippers">
                  <span class="sidebar-mini"> MD </span>
                  <span class="sidebar-normal"> {{ __('Manage Dropshippers') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'cabangs' ? ' active' : '' }}">
                <a class="nav-link" href="/branchs">
                  <span class="sidebar-mini"> MB </span>
                  <span class="sidebar-normal"> {{ __('Manage Branchs') }} </span>
                </a>
              </li>
              @endif
            </ul>
          </div>
        </li>
      
      @if(Auth::user()->role == 'Admin')
        <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('table') }}">
            <i class="material-icons">monetization_on</i>
              <p>{{ __('Employees Salary') }}</p>
          </a>
        </li>
      @else
        <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('table') }}">
            <i class="material-icons">monetization_on</i>
              <p>{{ __('Your Salary') }}</p>
          </a>
        </li>
      @endif

      @if(Auth::user()->role == 'Admin')
        <li class="nav-item{{ $activePage == 'kehadiran' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('kehadiran') }}">
            <i class="material-icons">checklist</i>
              <p>{{ __('Attendance') }}</p>
          </a>
        </li>
      @else 
        <li class="nav-item{{ $activePage == 'kehadiran' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('kehadiran') }}">
            <i class="material-icons">checklist</i>
              <p>{{ __('Your Attendance') }}</p>
          </a>
        </li>
      @endif

      <li class="nav-item{{ $activePage == 'daftar_pesanan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('daftar_pesanan') }}">
          <i class="material-icons">list_alt</i>
            <p>{{ __('Order List') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
