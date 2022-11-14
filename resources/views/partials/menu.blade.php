
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
        <a href="{{ route('admin.espace.index') }}" class="side-nav-link">
            <i class="uil-box"></i>
            <span> Logements </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.acquisition.index') }}" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Contrats </span>
        </a>
    </li>

</ul>

