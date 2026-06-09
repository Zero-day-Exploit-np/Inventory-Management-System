@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="mb-4">Profit Dashboard</h3>

    <div class="row">

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Today Profit</h5>
                <h3 class="text-success">₹ {{ number_format($dailyProfit, 2) }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Monthly Profit</h5>
                <h3 class="text-primary">₹ {{ number_format($monthlyProfit, 2) }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Profit</h5>
                <h3 class="text-dark">₹ {{ number_format($totalProfit, 2) }}</h3>
            </div>
        </div>

    </div>

    <div class="mt-5">
        <h5>Last 7 Days Profit</h5>
        <canvas id="profitChart"></canvas>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = @json(array_column($dailyChart, 'date'));
    const data = @json(array_column($dailyChart, 'profit'));

    new Chart(document.getElementById('profitChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Daily Profit',
                data: data,
                borderColor: 'green',
                tension: 0.4,
                fill: true
            }]
        }
    });
</script>
@endpush