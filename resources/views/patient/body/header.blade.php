<!-- Header -->
<header class="header header-custom header-fixed inner-header relative">
<div class="container">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="index.html" class="navbar-brand logo">
                <img src="{{ asset('backend/assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="header-menu">
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.html" class="menu-logo">
                        <img src="{{ asset('backend/assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
<ul class="main-nav">
                                <li class="has-submenu megamenu">
    <a href="javascript:void(0);">Home  </a>
     
    </li>
    <li class="has-submenu">
        <a href="javascript:void(0);">Doctors  </a>
        
    </li>
    <li class="has-submenu active">
        <a href="javascript:void(0);">Patients  </a>
         
    </li>
  
    
   
    <li class="has-submenu">
        <a href="#">Blog  </a>
        
    </li>
     
</ul>
            </div>
            <ul class="nav header-navbar-rht">
                <li class="searchbar">
                    <a href="javascript:void(0);"><i class="feather-search"></i></a>
                    <div class="togglesearch">
                        <form action="search.html">
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <button type="submit" class="btn">Search</button>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="header-theme noti-nav">
                    <a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle">
                        <i class="isax isax-sun-1"></i>
                    </a>
                    <a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle activate">
                        <i class="isax isax-moon"></i>
                    </a>
                </li>
                
                <!-- Notifications -->
                <li class="nav-item dropdown noti-nav me-3 pe-0">
                    <a href="#" class="dropdown-toggle active-dot active-dot-danger nav-link p-0" data-bs-toggle="dropdown">
                        <i class="isax isax-notification-bing"></i>
                    </a>
                    <div class="dropdown-menu notifications dropdown-menu-end ">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                        </div>
<div class="noti-content">
<ul class="notification-list">
    <li class="notification-message">
        <a href="#">
            <div class="notify-block d-flex">
                <span class="avatar">
                    <img class="avatar-img" alt="Ruby perin" src="{{ asset('backend/assets/img/clients/client-01.jpg') }}">
                </span>
                <div class="media-body">
                    <h6>Travis Tremble <span class="notification-time">18.30 PM</span></h6>
                    <p class="noti-details">Sent a amount of $210 for his Appointment  <span class="noti-title">Dr.Ruby perin </span></p>
                </div>
            </div>
        </a>
    </li>
    <li class="notification-message">
        <a href="#">
            <div class="notify-block d-flex">
                <span class="avatar">
                    <img class="avatar-img" alt="Hendry Watt" src="{{ asset('backend/assets/img/clients/client-02.jpg') }}">
                </span>
                <div class="media-body">
                    <h6>Travis Tremble <span class="notification-time">12 Min Ago</span></h6>
                    <p class="noti-details"> has booked her appointment to  <span class="noti-title">Dr. Hendry Watt</span></p>
                </div>
            </div>
        </a>
    </li>
                                
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- Messages -->
                <li class="nav-item noti-nav me-3 pe-0">
                    <a href="chat.html" class="dropdown-toggle nav-link active-dot active-dot-success p-0">
                        <i class="isax isax-message-2"></i>
                    </a>
                </li>
                <!-- /Messages -->

                <!-- Cart -->
                
                <!-- /Cart -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="nav-link ps-0" data-bs-toggle="dropdown">
                        <span class="user-img">
                            @if(auth()->user()->profile_photo)
                                <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->profile_photo) }}" width="31" alt="{{ auth()->user()->first_name }}">
                            @else
                                <img class="rounded-circle" src="{{ asset('backend/assets/img/doctors-dashboard/profile-06.jpg') }}" width="31" alt="{{ auth()->user()->first_name }}">
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                @if(auth()->user()->profile_photo)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="User Image" class="avatar-img rounded-circle">
                                @else
                                    <img src="{{ asset('backend/assets/img/doctors-dashboard/profile-06.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                                @endif
                            </div>
                            <div class="user-text">
                                <h6>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h6>
                                <p class="text-muted mb-0">Patient</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>

                        <form method="POST" action="{{ route('logout') }}" id="patient-logout-form">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault(); document.getElementById('patient-logout-form').submit();">
                            Logout
                        </a>
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
        </div>
    </nav>
</div>
</header>
<!-- /Header -->

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="isax isax-home-15"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Patient</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <h2 class="breadcrumb-title">Patient Dashboard</h2>
                </nav>
            </div>
        </div>
    </div>
    <div class="breadcrumb-bg">
        <img src="{{ asset('backend/assets/img/bg/breadcrumb-bg-01.png') }}" alt="img" class="breadcrumb-bg-01">
        <img src="{{ asset('backend/assets/img/bg/breadcrumb-bg-02.png') }}" alt="img" class="breadcrumb-bg-02">
        <img src="{{ asset('backend/assets/img/bg/breadcrumb-icon.png') }}" alt="img" class="breadcrumb-bg-03">
        <img src="{{ asset('backend/assets/img/bg/breadcrumb-icon.png') }}" alt="img" class="breadcrumb-bg-04">
    </div>
</div>
<!-- /Breadcrumb -->