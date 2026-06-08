<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .auth-container {
            max-width: 420px;
            width: 100%;
        }

        .card {
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .2);
            border-radius: 12px;
        }

        .card-body {
            padding: 2.5rem;
        }

        .btn-register {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(37, 99, 235, .4);
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, .25);
        }

        .text-muted-link {
            color: #4b5563;
            text-decoration: none;
        }

        .text-muted-link:hover {
            color: #2563eb;
        }

        .brand-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-icon {
            font-size: 2.5rem;
            color: #2563eb;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="auth-container mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="brand-section">
                        <div class="brand-icon"><i class="bi bi-box-seam"></i></div>
                        <h4 class="fw-bold mb-2">Create Account</h4>
                        <small class="text-muted">Join Inventory Management today</small>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe" required autofocus autocomplete="name">
                            @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com" required autocomplete="username">
                            @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="At least 8 characters" required autocomplete="new-password">
                            @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm password" required autocomplete="new-password">
                            @error('password_confirmation')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-register w-100 text-white mb-3">Create Account</button>
                    </form>

                    <div class="text-center small text-muted">
                        Already have an account? <a href="{{ route('login') }}" class="text-muted-link fw-bold">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</form>
</x-guest-layout>