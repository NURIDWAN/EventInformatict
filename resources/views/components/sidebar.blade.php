<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a>{{$setting->title}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a>{{$setting->sort_title}}</a>
        </div>
        <ul class="sidebar-menu">


            @hasrole('Admin|Superadmin')
                <li class="{{ request()->is('admin/dashboard') ? 'admin/dashboard' : '' }}"><a class="nav-link" href="{{route('dashboard')}}"><i class="ion-grid"></i> <span>Dashboard</span></a></li>
            @endhasrole
            @hasrole('User')
                <li class="{{ request()->is('/dashboard') ? 'dashboard' : '' }}"><a class="nav-link" href="{{route('dashboard.user')}}"><i class="ion-grid"></i> <span>Dashboard</span></a></li>
            @endhasrole

            @hasrole('User')
            <li class="{{ request()->is('order') ? 'active' : '' }}"><a class="nav-link" href="{{route('order.user')}}"><i class="ion-ios-compose-outline"></i> <span>Pesanan</span></a></li>
            <li class="{{ request()->is('payment') ? 'active' : '' }}"><a class="nav-link" href="{{route('payment.user')}}"><i class="ion-social-usd"></i> <span>Pembayaran</span></a></li>
            <li class="{{ request()->is('payment-confirmed') ? 'active' : '' }}"><a class="nav-link" href="{{route('payment-confirmed.user')}}"><i class="ion-android-done"></i> <span>Konfirmasi Pembayaran</span></a></li>
            <li class="{{ request()->is('timeline') ? 'active' : '' }}"><a href="{{route('timeline.user')}}" class="nav-link"><i class="ion-calendar"></i> <span>Kegitan Acara</span></a></li>
            <li class="{{ request()->is('documentation') ? 'active' : '' }}"><a class="nav-link" href="{{route('documentation.user')}}"><i class="ion-ios-camera-outline"></i> <span>Dokumentasi</span></a></li>
            @endhasrole
            @hasrole('Admin|SuperAdmin')
            <li class="{{ request()->is('admin/menu') ? 'active' : '' }}"><a class="nav-link" href="{{route('menu')}}"><i class="ion-ios-list-outline"></i><span>Menu</span></a></li>
            <li class="{{ request()->is('admin/orders') ? 'active' : '' }}"><a class="nav-link" href="{{route('orders')}}"><i  class="ion-ios-compose-outline"></i><span>Pesanan</span></a></li>
            <li class="{{ request()->is('confirm-payment') ? 'active' : '' }}"><a class="nav-link" href="{{route('confirm-payment')}}"><i class="ion-social-usd"></i><span>Konfirmasi Pembayaran</span></a></li>
            <li class="{{ request()->is('admin/timeline') ? 'active' : '' }}"><a href="{{route('timeline')}}" class="nav-link" ><i class="ion-calendar"></i><span>Kegitan Acara</span></a></li>
            <li class="{{ request()->is('admin/documentation') ? 'active' : '' }}"><a class="nav-link" href="{{route('documentation')}}"><i class="ion-ios-camera-outline"></i><span>Dokumentasi</span></a></li>

            <li class="{{ request()->is('admin/setting-web') ? 'active' : '' }}"><a class="nav-link" href="{{route('setting.web')}}"><i class="ion-levels"></i><span>Setting Web</span></a></li>
            <li class="{{ request()->is('admin/users') ? 'active' : '' }}"><a class="nav-link" href="{{route('users')}}"><i class="ion-person"></i><span>Users</span></a></li>

            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="ion-email-unread"></i><span>Announcement</span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/notif') ? 'active' : '' }}"><a class="nav-link" href="{{route('notif')}}"><i class="ion-email"></i><span>Notification</span></a></li>
                <li class="{{ request()->is('admin/announcement-payment') ? 'active' : '' }}"><a class="nav-link" href="{{route('announcement.payment')}}"><i class="ion-user"></i><span>Payment</span></a></li>
                <li class="{{ request()->is('admin/announcement-frontend') ? 'active' : '' }}"><a class="nav-link" href="{{route('announcement.frontend')}}"><i class="ion-email"></i><span>Frontend</span></a></li>
              </ul>
            </li>


            @endhasrole

        </ul>
    </aside>
</div>
