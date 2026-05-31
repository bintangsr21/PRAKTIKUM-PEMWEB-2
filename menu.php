<?php $page = $_GET['page'] ?? 'home'; ?>

<style>
    /* Custom Styling untuk Navbar */
    .custom-navbar {
        background: rgba(11, 31, 23, 0.9) !important;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(34, 197, 94, 0.2);
        padding: 12px 0;
    }

    .navbar-brand {
        color: #22c55e !important;
        font-family: 'Poppins', sans-serif;
        transition: 0.3s;
    }

    .navbar-brand:hover {
        text-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.8) !important;
        font-weight: 500;
        margin: 0 5px;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-link:hover {
        color: #4ade80 !important;
    }

    /* Efek Underline pada Link Aktif */
    .nav-link.active-link {
        color: #22c55e !important;
        font-weight: 700;
    }

    .nav-link.active-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 10%;
        width: 80%;
        height: 2px;
        background: #22c55e;
        box-shadow: 0 0 10px rgba(34, 197, 94, 0.8);
    }

    /* Styling Dropdown */
    .custom-dropdown {
        background: #0f2a1f !important;
        border: 1px solid rgba(34, 197, 94, 0.2) !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 25px rgba(0,0,0,0.4) !important;
        padding: 8px !important;
        margin-top: 10px !important;
    }

    .dropdown-item {
        color: white !important;
        border-radius: 8px;
        padding: 10px 15px;
        transition: 0.2s;
    }

    .dropdown-item:hover {
        background: rgba(34, 197, 94, 0.2) !important;
        color: #4ade80 !important;
        padding-left: 20px;
    }

    /* User Profile di Navbar */
    .user-name-box {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.2);
        padding: 5px 15px;
        border-radius: 20px;
        color: #bbf7d0;
        font-weight: 500;
    }

    /* Burger Menu Icon Custom */
    .navbar-toggler {
        border: 1px solid #1f4d3a !important;
        padding: 5px;
    }
    .navbar-toggler:focus { box-shadow: none; }
</style>

<nav class="navbar navbar-expand-lg sticky-top custom-navbar px-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4" href="index.php">
            <span style="color: #4ade80;">My</span>Web
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <!-- MENU UTAMA -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $page=='home'?'active-link':'' ?>" href="index.php">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page=='about'?'active-link':'' ?>" href="?page=about">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page=='contact'?'active-link':'' ?>" href="?page=contact">
                        Contact
                    </a>
                </li>

                <!-- DROPDOWN STUDIES -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($page=='level'||$page=='studies')?'active-link':'' ?>" 
                       href="#" id="studiesDrop" role="button" data-bs-toggle="dropdown">
                        Studies
                    </a>
                    <ul class="dropdown-menu custom-dropdown">
                        <li>
                            <a class="dropdown-item" href="?page=level">
                                <i class="bi bi-layers me-2"></i> Level
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" style="background-color: rgba(34, 197, 94, 0.1);">
                        </li>
                        <li>
                            <a class="dropdown-item" href="?page=studies">
                                <i class="bi bi-book me-2"></i> Studies List
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- MENU KANAN (User/Login) -->
            <ul class="navbar-nav align-items-center">
                <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item me-3">
                        <div class="user-name-box d-flex align-items-center">
                            <i class="bi bi-person-circle me-2"></i>
                            <?= $_SESSION['user']['nama']; ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm" 
                           style="background: #b91c1c; color: white; border: none; padding: 8px 16px; border-radius: 10px; transition: 0.3s;"
                           onmouseover="this.style.background='#991b1b'"
                           onmouseout="this.style.background='#b91c1c'"
                           href="logout.php">
                           Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-sm" 
                           style="background: linear-gradient(135deg, #22c55e, #16a34a); color: white; border: none; padding: 8px 20px; border-radius: 10px; font-weight: 600; box-shadow: 0 4px 15px rgba(22, 163, 74, 0.2);"
                           href="?page=login">
                           Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>