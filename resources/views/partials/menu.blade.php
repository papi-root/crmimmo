
<!--- Sidemenu -->
<ul class="side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>

    <li class="side-nav-item">
        <a href="#sidebarDashboards" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
        </a>
    </li>

    <li class="side-nav-title side-nav-item">Gestion</li>

    <li class="side-nav-item">
        <a href="{{ route('admin.tiers.index') }}" class="side-nav-link">
            <i class="uil-user-square"></i>
            <span> Tiers </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.bien.index') }}" class="side-nav-link">
            <i class="uil-store-alt"></i>
            <span> Biens </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="apps-calendar.html" class="side-nav-link">
            <i class="{{ route('admin.espace.index') }} "></i>
            <span> Espaces </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.acquisition.index') }}" class="side-nav-link">
            <i class="uil-key-skeleton-alt"></i>
            <span> Acquisition </span>
        </a>
    </li>

</ul>

