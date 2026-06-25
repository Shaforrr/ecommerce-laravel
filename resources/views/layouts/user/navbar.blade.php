<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">
            <i class="fas fa-store"></i> Merch Store
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link {{ Route::is('user.dashboard') ? 'active' : '' }}"
                       href="{{ route('user.dashboard') }}">

                        <i class="fas fa-home"></i>
                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ Route::is('user.transaction') ? 'active' : '' }}"
                       href="{{ route('user.transaction') }}">

                        <i class="fas fa-shopping-cart"></i>
                        Riwayat

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="{{ route('user.logout') }}">

                        <i class="fas fa-sign-out-alt"></i>
                        Logout

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>