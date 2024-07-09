@php
        $currentHour = date('H');
        $greeting = '';
        if ($currentHour > 5){
            $greeting = '<i class="wi wi-day-haze"></i> Selamat Pagi ';
        } elseif ($currentHour > 12) {
            $greeting = '<i class="wi wi-day-cloudy-high"></i> Selamat Siang ';
        } elseif ($currentHour > 18) {
            $greeting = '<i class="wi wi-day-light-wind"></i> Selamat Sore ';
        } else {
            $greeting = '<i class="wi wi-night-alt-partly-cloudy"></i> Selamat Malam ';
        }
@endphp
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="mr-auto form-inline">
        <ul class="mr-3 navbar-nav">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          <li><a  class="text-white nav-link nav-link-lg d-lg-none">{!!$greeting!!}</a></li>
        </ul>
      </form>
    <ul class=" navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                @foreach ($notif as $item)
                <a class="dropdown-item">
                  <div class="text-white dropdown-item-icon bg-info">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                   <b>{{$item->name}}</b><br><p>{{$item->description}}</p>
                    <div class="time">{{$item->getCreatedAtTrace()}}</div>
                  </div>
                </a>
                @endforeach

              </div>
              <div class="text-center dropdown-footer">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-inline d-lg-inline d-md-inline d-none">
                    @if (Auth::user())
                    {!!$greeting!!} | {{Auth::user()->name}}
                    @else
                    User |
                    @endif
                </div>
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="mr-1 rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('profile.edit')}}" class="dropdown-item has-icon text-primary">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>

        </li>
    </ul>
</nav>
