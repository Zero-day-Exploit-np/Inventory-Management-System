@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4 page-header">
    <div>
        <h3 class="mb-0">Activity Logs</h3>
        <small class="text-muted">Track all system activities and user actions</small>
    </div>
    <div class="d-flex gap-2">
        <form method="POST" action="#" class="d-inline" onsubmit="return confirm('Clear all logs?');">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm" style="display: none;">
                <i class="bi bi-trash me-1"></i>Clear Logs
            </button>
        </form>
    </div>
</div>

<div class="mb-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
    <form method="GET" class="d-flex flex-grow-1">
        <div class="input-group" style="max-width: 350px;">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
            <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search by user or action...">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    <div class="d-flex gap-2">
        <select name="action_filter" class="form-select" style="width: auto;" onchange="window.location.href='{{ route('activity-logs.index') }}?action_filter='+this.value;">
            <option value="">All Actions</option>
            <option value="created" {{ request('action_filter') == 'created' ? 'selected' : '' }}>Created</option>
            <option value="updated" {{ request('action_filter') == 'updated' ? 'selected' : '' }}>Updated</option>
            <option value="deleted" {{ request('action_filter') == 'deleted' ? 'selected' : '' }}>Deleted</option>
            <option value="viewed" {{ request('action_filter') == 'viewed' ? 'selected' : '' }}>Viewed</option>
        </select>
        <a href="{{ route('activity-logs.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a>
    </div>
</div>

<div class="card card-soft mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">User</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th class="text-center">Module</th>
                        <th class="text-end pe-4">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-2">
                                <div style="width: 36px; height: 36px; background: var(--primary-soft); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary); font-weight: bold;">
                                    {{ substr($log->user->name ?? 'U', 0, 1) }}
                                </div>
                                <div>
                                    <div class="fw-bold small">{{ $log->user->name ?? 'Unknown User' }}</div>
                                    <small class="text-muted">{{ $log->user->email ?? '-' }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if(strtolower($log->action) == 'created')
                            <span class="badge bg-success"><i class="bi bi-plus-circle me-1"></i>{{ $log->action }}</span>
                            @elseif(strtolower($log->action) == 'updated')
                            <span class="badge bg-info"><i class="bi bi-pencil me-1"></i>{{ $log->action }}</span>
                            @elseif(strtolower($log->action) == 'deleted')
                            <span class="badge bg-danger"><i class="bi bi-trash me-1"></i>{{ $log->action }}</span>
                            @elseif(strtolower($log->action) == 'viewed')
                            <span class="badge bg-secondary"><i class="bi bi-eye me-1"></i>{{ $log->action }}</span>
                            @else
                            <span class="badge bg-secondary">{{ $log->action }}</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($log->description, 50) }}</small>
                        </td>
                        <td class="text-center">
                            @php
                            $module = strtolower(explode(' ', $log->description)[count(explode(' ', $log->description)) - 1] ?? 'system');
                            @endphp
                            <span class="badge bg-light text-dark">{{ ucfirst($module) }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <small class="text-muted">{{ $log->created_at->format('M d, Y') }}</small><br>
                            <small class="text-muted">{{ $log->created_at->format('H:i:s') }}</small>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="p-4 text-center">
                                <h5 class="mb-1">No activity logs found</h5>
                                <p class="text-muted mb-0">System activity will appear here as you use the application.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center">
    <div class="text-muted small">
        @if($logs->count())
        Showing {{ $logs->firstItem() }} to {{ $logs->lastItem() }} of {{ $logs->total() }} logs
        @endif
    </div>
    <div>
        {{ $logs->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection