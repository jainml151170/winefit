<header class="bg-color-dark p-3">
    <div class="container-fluid p-0">
        <div class="header-content d-flex align-items-center">
            <div class="toggle-btn">
                <button type="button" id="sidebarCollapse">
                    <span id="toggleText"><i class="fa-solid fa-bars"></i></span>
                </button>
            </div>
            <div class="logo">
                <img src="https://www.winefit.com/wp-content/uploads/2022/05/LOGO-SENZA-SFONDO_-e1652862686501.png"
                    alt="" class="admin-logo">
            </div>
            <div class="user-account"><span>
                    <ul class="navbar-nav ms-auto mb-lg-0 profile-menu">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fs-4 pe-4" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('distributor.account') }}"><i class="fas fa-sliders-h fa-fw"></i>
                                        Account</a></li>
                                <li><a class="dropdown-item" href="{{ route('distributor.setting') }}"><i class="fas fa-cog fa-fw"></i> Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</header>