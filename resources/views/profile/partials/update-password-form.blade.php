<section>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label fw-semibold">
                Current Password
            </label>
            <input
                type="password"
                id="current_password"
                name="current_password"
                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                autocomplete="current-password">

            @error('current_password', 'updatePassword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">
                New Password
            </label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                autocomplete="new-password">

            @error('password', 'updatePassword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">
                Confirm Password
            </label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password">
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
            <span class="text-success">
                <i class="fas fa-check-circle me-1"></i>
                Password Updated
            </span>
            @endif
        </div>
    </form>
</section>