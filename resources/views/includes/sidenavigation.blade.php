<aside class="noprint sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark " id="sidenav-main">
    <div class="noprint sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('dashboard')}}">
        <img src="{{asset('img/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        {{-- <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span> --}}
      </a>
    </div>
    <hr class="noprint horizontal light mt-0 mb-2">
    <div class="noprint collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav noprint">
        <li class="nav-item">
          <a class="nav-link text-white {{URL::current() == route('dashboard') ? 'bg-gradient-primary active' : ''}}" href="{{route('dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10 fas fa-tachometer-alt"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{URL::current() == route('bookins') ? 'bg-gradient-primary active' : ''}}" href="{{route('bookins')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10 fas fa-table"></i>
            </div>
            <span class="nav-link-text ms-1">Bookings <span class="badge text-bg-white text-danger rounded bknum"></span>
        </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{URL::current() == route('checkin') ? 'bg-gradient-primary active' : ''}}" href="{{route('checkin')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10 fas fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Checked In Clients</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{URL::current() == route('checkout') ? 'bg-gradient-primary active' : ''}}" href="{{route('checkout')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10 fas fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Checked Out Clients</span>
          </a>
        </li>
      
       @if (Auth::user()->roles == '1' || Auth::user()->roles == '2')
       <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('htl') ? 'bg-gradient-primary active' : ''}}" href="{{route('htl')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-home"></i>
          </div>
          <span class="nav-link-text ms-1">Hotel Branches</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('bkopt') ? 'bg-gradient-primary active' : ''}}" href="{{route('bkopt')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-book"></i>
          </div>
          <span class="nav-link-text ms-1">Booking Options</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('admin.gallery') ? 'bg-gradient-primary active' : ''}}" href="{{route('admin.gallery')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-image"></i>
          </div>
          <span class="nav-link-text ms-1">Gallery</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('admin.faq') ? 'bg-gradient-primary active' : ''}}" href="{{route('admin.faq')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-comment"></i>
          </div>
          <span class="nav-link-text ms-1">Faq</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('news') ? 'bg-gradient-primary active' : ''}}" href="{{route('news')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-microphone-alt"></i>
          </div>
          <span class="nav-link-text ms-1">Newsletter</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('tst.index') ? 'bg-gradient-primary active' : ''}}" href="{{route('tst.index')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-book"></i>
          </div>
          <span class="nav-link-text ms-1">Testimonial</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('about.bio') ? 'bg-gradient-primary active' : ''}}" href="{{route('about.bio')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-user"></i>
          </div>
          <span class="nav-link-text ms-1">About Us</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('team.index') ? 'bg-gradient-primary active' : ''}}" href="{{route('team.index')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">Team</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('admin.contact') ? 'bg-gradient-primary active' : ''}}" href="{{route('admin.contact')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-envelope"></i>
          </div>
          <span class="nav-link-text ms-1">Contact</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('privacypg') ? 'bg-gradient-primary active' : ''}}" href="{{route('privacypg')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-user"></i>
          </div>
          <span class="nav-link-text ms-1">Privacy Policy</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('term') ? 'bg-gradient-primary active' : ''}}" href="{{route('term')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-user"></i>
          </div>
          <span class="nav-link-text ms-1">Terms & Conditions</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('admin.report') ? 'bg-gradient-primary active' : ''}}" href="{{route('admin.report')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-book-open"></i>
          </div>
          <span class="nav-link-text ms-1">Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('user.account') ? 'bg-gradient-primary active' : ''}}" href="{{route('user.account')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">Users Account</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{URL::current() == route('profile') ? 'bg-gradient-primary active' : ''}}" href="{{route('profile')}}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 fas fa-user"></i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
       @endif
       
      </ul>
    </div>
    <div class="noprint sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
          <a class="btn bg-gradient-primary mt-4 w-100" href="{{route('admin.logout')}}" type="button">Sign Out</a>
        </div>
      </div>
  </aside>