<?php
ob_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio - Muhammad Bintang Siregar</title>

    <!-- Google Fonts untuk tampilan lebih Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #071a12;
            --card-dark: #0b1f17;
            --emerald-accent: #22c55e;
            --emerald-dim: #16a34a;
            --border-color: rgba(34, 197, 94, 0.2);
            --text-main: #e2e8f0;
        }

        body {
            background: radial-gradient(circle at top right, #0d2d1f, var(--bg-dark));
            background-attachment: fixed;
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* CONTENT AREA */
        .main-content {
            background: rgba(11, 31, 23, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 30px;
            color: var(--text-main);
            min-height: 70vh;
            animation: fadeIn 0.5s ease-out;
        }

        /* ANIMASI FADE IN SAAT PINDAH PAGE */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* FLEX CONTAINER */
        .container-fluid {
            flex: 1;
            padding-bottom: 40px;
        }

        /* CARD STYLE UNTUK SIDEBAR DLL */
        .card-dark {
            background: var(--card-dark);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .card-dark:hover {
            border-color: var(--emerald-accent);
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.1);
        }

        /* SHADOW CUSTOM */
        .shadow-sm {
            box-shadow: 0 10px 30px rgba(0,0,0,0.4) !important;
        }

        /* SCROLLBAR CUSTOM (CHROME/EDGE) */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--bg-dark), var(--emerald-dim));
            border-radius: 10px;
            border: 2px solid var(--bg-dark);
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-dark);
        }

        /* TEXT HELPERS */
        .text-green { color: #4ade80; }
        .fw-semibold { font-weight: 600; }

        /* BUTTON GREEN CUSTOM */
        .btn-green {
            background: linear-gradient(135deg, var(--emerald-accent), var(--emerald-dim));
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-green:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.4);
            color: white;
        }

        /* NAVBAR SPACING FIX */
        .navbar {
            margin-bottom: 20px;
        }

        /* MENGATUR SIDEBAR AGAR LEBIH RAPI */
        .sidebar-sticky {
            position: sticky;
            top: 90px;
        }

    </style>
</head>

<body>

    <!-- HEADER & MENU -->
    <!-- Jika header.php dan menu.php Anda sudah dipisah, pastikan isinya sudah menggunakan class navbar yang kita buat sebelumnya -->
    <?php include "header.php"; ?>
    <?php include "menu.php"; ?>

    <!-- MAIN WRAPPER -->
    <div class="container-fluid px-4">
        <div class="row g-4 mt-2">

            <!-- SIDEBAR COLUMN -->
            <div class="col-md-3">
                <div class="sidebar-sticky">
                    <?php include "sidebar.php"; ?>
                </div>
            </div>

            <!-- MAIN CONTENT COLUMN -->
            <div class="col-md-9">
                <main class="main-content shadow-sm">
                    <?php
                    $page = $_GET['page'] ?? 'home';

                    // Pengamanan sederhana untuk include file
                    $allowed_pages = ['about', 'contact', 'login', 'level', 'studies', 'home'];
                    
                    if (in_array($page, $allowed_pages)) {
                        include $page . ".php";
                    } else {
                        include "home.php";
                    }
                    ?>
                </main>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

    <!-- BOOTSTRAP BUNDLE JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Tooltip & Popover Initialization (Opsional) -->
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>
</html>

<?php ob_end_flush(); ?>