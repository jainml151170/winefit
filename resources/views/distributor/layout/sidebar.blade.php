    <div class="sidebar-menu text-center bg-color-dark">
        <div>
            <ul class="list-unstyled">
                <li class="{{ Route::currentRouteName() === 'distributor.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('distributor.dashboard') }}" class=" text-decoration-none text-white"><i
                            class="fa-regular fa-envelope text-white"></i></a>
                </li>
                <li class="{{ Route::currentRouteName() === 'distributors.index' ? 'active' : '' }}">
                    <a href="{{ route('distributors.index') }}" class="text-decoration-none text-white"><i
                            class="fa-regular fa-message text-white"></i></a>
                </li>
                {{-- <li class="{{ Route::currentRouteName() === 'wine-machines.index' ? 'active' : '' }}">
                    <a href="{{ route('wine-machines.index') }}" class="text-decoration-none text-white"><i
                            class="fa-solid fa-users text-white"></i></a>
                </li> --}}
                <li>
                    <a href="#home" class="text-decoration-none text-white"><i
                            class="fa-solid fa-video text-white"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="toggle-menus">
        <div id="sidebar">
            <ul class="list-unstyled">
                <li class="{{ Route::currentRouteName() === 'distributor.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('distributor.dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li class="{{ Route::currentRouteName() === 'distributors.index' ? 'active' : '' }}">
                    <a href="{{ route('distributors.index') }}">{{ __('WineVendors') }}</a>
                </li>
                {{-- <li class="{{ Route::currentRouteName() === 'wine-machines.index' ? 'active' : '' }}">
                    <a href="{{ route('wine-machines.index') }}">{{ __('Wine Machines') }}</a>
                </li> --}}
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>