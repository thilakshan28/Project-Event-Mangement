<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3" > Admin Portal </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('order.index') }}">
            <i class="fas fa-tags"></i>
            <span>Orders</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('event.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Events</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('venue.index') }}">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Venues</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('food.index') }}">
            <i class="fas fa-fw fa-hamburger"></i>
            <span>Food</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('facility.index') }}">
            <i class="fas fa-fw  fa-music"></i>
            <span>Facilities</span></a>
    </li>



    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransportation"
            aria-expanded="true" aria-controls="collapseTransportation">
            <i class="fas fa-fw fa-bus-alt"></i>
            <span>Transportation</span>
        </a>
        <div id="collapseTransportation" class="collapse" aria-labelledby="headingTransportation"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Transportation:</h6>
                <a class="collapse-item" href="{{ route('travel.index') }}">Travel</a>
                <a class="collapse-item" href="{{ route('parking.index') }}">Parking</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('report.event') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Report</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->



</ul>
