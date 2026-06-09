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
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --bg: #f8fafc;
            --text: #1f2937;
        }

        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
        }

        .navbar-brand {
            color: var(--primary) !important;
            font-weight: 700;
            font-size: 1.35rem;
        }

        .hero-section {
            min-height: 600px;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--primary) 0%, #1e40af 100%);
            color: white;
            overflow: hidden;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"><path d="M0,50 Q300,0 600,50 T1200,50 L1200,0 L0,0 Z" fill="rgba(255,255,255,.1)"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .hero-content p {
            font-size: 1.35rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            max-width: 550px;
        }

        .btn-primary {
            background: white;
            color: var(--primary);
            border: none;
            padding: .75rem 2rem;
            font-weight: 600;
            transition: all .3s ease;
        }

        .btn-primary:hover {
            background: #f0f4f8;
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        }

        .btn-outline-primary {
            color: white;
            border-color: white;
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: white;
            color: var(--primary);
        }

        .features-section {
            padding: 5rem 0;
            background: white;
        }

        .feature-card {
            border-radius: 1rem;
            border: 1px solid #e5e7eb;
            padding: 2rem;
            text-align: center;
            transition: all .3s ease;
            background: #fafbfc;
        }

        .feature-card:hover {
            border-color: var(--primary);
            box-shadow: 0 20px 45px rgba(37, 99, 235, .1);
            transform: translateY(-4px);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: rgba(37, 99, 235, .1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            color: var(--primary);
        }

        .feature-card h5 {
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text);
        }

        .feature-card p {
            color: #6b7280;
            margin: 0;
        }

        .cta-section {
            padding: 4rem 0;
            background: var(--bg);
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--text);
        }

        .cta-section p {
            font-size: 1.15rem;
            color: #6b7280;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        footer {
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 2rem 0;
            text-align: center;
            color: #6b7280;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-box-seam me-2"></i>Inventory SaaS
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="gap-3 d-flex">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Log In</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container hero-content">
            <h1>Modern Inventory Management</h1>
            <p>Streamline your inventory operations with our intuitive, powerful SaaS platform designed for businesses of all sizes.</p>
            <div class="d-flex gap-3">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
                @else
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started Free</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">Sign In</a>
                @endauth
                @endif
            </div>
        </div>
    </div>

    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem;">Powerful Features</h2>
                <p style="color: #6b7280; font-size: 1.15rem;">Everything you need to manage your inventory efficiently</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h5>Product Management</h5>
                        <p>Add, edit, and manage your products with detailed information, images, and pricing.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h5>Stock Tracking</h5>
                        <p>Real-time inventory tracking with low stock alerts and automatic notifications.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5>Supplier Management</h5>
                        <p>Organize and manage your suppliers with contact details and communication history.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <h5>Purchase Orders</h5>
                        <p>Create and manage purchase orders from suppliers to maintain optimal inventory levels.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h5>Sales Management</h5>
                        <p>Record sales, track revenue, and generate insights from your sales data.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-graph-bar"></i>
                        </div>
                        <h5>Analytics & Reports</h5>
                        <p>Get actionable insights with detailed analytics and customizable reports.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>Ready to streamline your inventory?</h2>
            <p>Join hundreds of businesses managing their inventory with Inventory SaaS.</p>
            <div>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Start Free Trial</a>
                @endif
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Inventory Management System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>