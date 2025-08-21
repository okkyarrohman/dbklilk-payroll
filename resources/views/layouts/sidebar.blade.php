<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('payroll.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Payroll</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('karyawan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Karyawan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
