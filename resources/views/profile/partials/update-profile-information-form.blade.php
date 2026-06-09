<section>
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name">

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username">

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="alert alert-warning">
            <p class="mb-2">
                Your email address is not verified.
            </p>

            <button
                form="send-verification"
                class="btn btn-sm btn-outline-primary">
                Resend Verification Email
            </button>

            @if (session('status') === 'verification-link-sent')
            <div class="mt-2 text-success">
                A new verification link has been sent to your email address.
            </div>
            @endif
        </div>
        @endif

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
            <span class="text-success">
                <i class="fas fa-check-circle me-1"></i>
                Saved Successfully
            </span>
            @endif
        </div>
    </form>
</section>