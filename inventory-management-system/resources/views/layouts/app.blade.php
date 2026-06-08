<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --bg: #f8fafc;
            --surface: #ffffff;
            --surface-muted: #f3f6fb;
            --border: #e5e7eb;
            --text-default: #1f2937;
            --text-muted: #4b5563;
            --primary: #2563eb;
            --primary-soft: rgba(37, 99, 235, .12);
            --sidebar-width: 280px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: var(--bg);
            color: var(--text-default);
            padding-top: 70px;
        }

        .navbar-custom {
            background: var(--surface);
            border-bottom: 1px solid rgba(229, 231, 235, .95);
            height: 70px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }

        .navbar-custom .navbar-brand {
            color: var(--primary);
            font-weight: 700;
        }

        .navbar-custom .form-control {
            min-width: 220px;
            border-radius: .85rem;
        }

        .navbar-custom .btn-icon {
            width: 44px;
            height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .navbar-custom .badge-notification {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ef4444;
            border: 2px solid #ffffff;
        }

        .sidebar {
            width: var(--sidebar-width);
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            background: linear-gradient(180deg, #111827 0%, #0f172a 100%);
            color: #e5e7eb;
            padding: 1.25rem 0;
            overflow-y: auto;
            transition: transform .3s ease, width .3s ease;
            border-right: 1px solid rgba(255, 255, 255, .08);
            z-index: 1020;
        }

        .sidebar .sidebar-brand {
            padding: 0 1.5rem;
            margin-bottom: 1.5rem;
        }

        .sidebar .sidebar-brand .brand-icon {
            width: 48px;
            height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(37, 99, 235, .15);
            color: var(--primary);
            border-radius: 14px;
        }

        .sidebar .nav-link {
            color: rgba(229, 231, 235, .88);
            padding: .85rem 1.5rem;
            border-radius: .9rem;
            transition: all .2s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #ffffff;
            background: rgba(37, 99, 235, .15);
            transform: translateX(2px);
        }

        .sidebar .nav-link i {
            font-size: 1.05rem;
            width: 1.3rem;
        }

        .sidebar .sidebar-heading {
            color: rgba(255, 255, 255, .65);
            text-transform: uppercase;
            font-size: .7rem;
            letter-spacing: .15em;
            padding: .25rem 1.5rem .75rem;
        }

        .sidebar .card-soft {
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 1rem;
            box-shadow: 0 20px 35px rgba(15, 23, 42, .12);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            padding: 1.6rem 1.6rem 2rem 1.6rem;
            transition: margin-left .3s ease, width .3s ease;
        }

        .main-content .page-header {
            margin-bottom: 1.75rem;
        }

        .card-soft {
            border: 1px solid rgba(229, 231, 235, .45);
            border-radius: 1rem;
            background: var(--surface);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .08);
        }

        .card-soft .card-body {
            padding: 1.35rem;
        }

        .table-responsive {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(15, 23, 42, .08);
        }

        .table thead th {
            background: #f8fafc;
            border-bottom: 1px solid rgba(229, 231, 235, .8);
        }

        .table-hover tbody tr:hover {
            background: rgba(37, 99, 235, .07);
        }

        .btn-soft-primary {
            background: rgba(37, 99, 235, .1);
            color: var(--primary);
            border: 1px solid transparent;
            transition: all .2s ease;
        }

        .btn-soft-primary:hover {
            background: rgba(37, 99, 235, .16);
            color: var(--primary);
        }

        .badge-outline {
            background: rgba(37, 99, 235, .08);
            color: var(--primary);
        }

        .chart-card {
            min-height: 320px;
        }

        @media (max-width: 991.98px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar {
                position: fixed;
                transform: translateX(-100%);
                width: 100%;
                max-width: 320px;
                transition: transform .3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .navbar-custom .form-control {
                min-width: 180px;
            }
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <div class="d-flex">
        @include('partials.sidebar')

        <main class="main-content">
            <div class="container-fluid px-0">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-octagon-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
                    <h6 class="mb-2">Please fix the following issues:</h6>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateTime = document.getElementById('dashboardDateTime');
            if (dateTime) {
                const updateDate = () => {
                    const now = new Date();
                    const options = {
                        weekday: 'short',
                        month: 'short',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    };
                    dateTime.textContent = now.toLocaleString(undefined, options);
                };
                updateDate();
                setInterval(updateDate, 60000);
            }

            const sidebarMenu = document.getElementById('sidebarMenu');
            const sidebarToggle = document.querySelector('[data-bs-toggle="offcanvas"]');
            if (sidebarToggle && sidebarMenu) {
                sidebarToggle.addEventListener('click', function() {
                    sidebarMenu.classList.toggle('show');
                });
            }
        });
    </script>
</body>

</html>