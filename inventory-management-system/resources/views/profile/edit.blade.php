@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="mb-0">Account Settings</h3>
        <small class="text-muted">Manage your profile and account preferences</small>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card card-soft mb-4">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Profile Information</h5>
            </div>
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card card-soft mb-4">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Change Password</h5>
            </div>
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card card-soft border-danger">
            <div class="card-header border-bottom border-danger bg-danger-soft">
                <h5 class="mb-0 text-danger">Danger Zone</h5>
            </div>
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-soft">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Account Info</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Email</small>
                    <div class="fw-bold">{{ auth()->user()->email }}</div>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Member Since</small>
                    <div class="fw-bold">{{ auth()->user()->created_at->format('M d, Y') }}</div>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Role</small>
                    <div><span class="badge bg-primary">{{ auth()->user()->role ?? 'User' }}</span></div>
                </div>
                <div>
                    <small class="text-muted d-block">Last Updated</small>
                    <div class="fw-bold">{{ auth()->user()->updated_at->format('M d, Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-danger-soft {
        background-color: rgba(220, 38, 38, 0.1);
    }
</style>

@endsection