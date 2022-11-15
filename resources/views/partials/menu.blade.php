
<!--- Sidemenu -->
<ul class="side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>

    <li class="side-nav-item">
        <a href="{{ route('admin.dashboard.index') }}" class="side-nav-link">
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

    <!--
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Contrats </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarEmail">
            <ul class="side-nav-second-level">
                <li>
                    <a href="{{ route('admin.acquisition.index') }}">Location </a>
                </li>
                <li>
                    <a href="apps-email-read.html">Vente</a>
                </li>
            </ul>
        </div>
    </li>
--> 

    <li class="side-nav-title side-nav-item">Utilisateurs</li>

    <li class="side-nav-item">
        <a href="{{ route('admin.permissions.index') }}" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Roles </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.permissions.index') }}" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Permission </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{ route('admin.users.index') }}" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Utilisateurs </span>
        </a>
    </li>

</ul>

