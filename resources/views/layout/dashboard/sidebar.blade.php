<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @if ($controller== 'Dashboard') active @endif">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item @if ($controller== 'transactions') active @endif">
            <a class="nav-link" href="{{route('transactions')}}">
                <i class="icon-archive menu-icon"></i>
                <span class="menu-title">List Pesanan</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->