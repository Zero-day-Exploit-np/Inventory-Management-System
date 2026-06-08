@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="mb-0">Reports & Analytics</h3>
        <small class="text-muted">View detailed reports and business insights</small>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-secondary btn-sm" onclick="window.print();">
            <i class="bi bi-printer me-1"></i>Print
        </button>
        <a href="#" class="btn btn-outline-primary btn-sm" onclick="exportCSV(); return false;">
            <i class="bi bi-download me-1"></i>Export CSV
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <a href="#sales-report" class="card card-soft border-0 text-decoration-none" style="border-left: 4px solid #2563eb;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total Sales</small>
                        <h4 class="mb-0">₹ {{ number_format($totalSales ?? 0, 2) }}</h4>
                    </div>
                    <div style="font-size: 2rem; opacity: .2;"><i class="bi bi-currency-dollar"></i></div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-soft border-0" style="border-left: 4px solid #22c55e;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total Purchases</small>
                        <h4 class="mb-0">₹ {{ number_format($totalPurchases ?? 0, 2) }}</h4>
                    </div>
                    <div style="font-size: 2rem; opacity: .2; color: #22c55e;"><i class="bi bi-cart-check"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-soft border-0" style="border-left: 4px solid #a855f7;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Net Profit</small>
                        <h4 class="mb-0">₹ {{ number_format(($totalSales ?? 0) - ($totalPurchases ?? 0), 2) }}</h4>
                    </div>
                    <div style="font-size: 2rem; opacity: .2; color: #a855f7;"><i class="bi bi-graph-up"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card card-soft border-0" style="border-left: 4px solid #f59e0b;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Transactions</small>
                        <h4 class="mb-0">{{ ($totalTransactions ?? 0) }}</h4>
                    </div>
                    <div style="font-size: 2rem; opacity: .2; color: #f59e0b;"><i class="bi bi-receipt"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="card card-soft" id="sales-report">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Sales Report</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead>
                            <tr class="text-muted small">
                                <th>Product</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentSales ?? [] as $sale)
                            <tr>
                                <td class="fw-bold small">{{ $sale->product->name ?? 'N/A' }}</td>
                                <td class="text-center"><span class="badge bg-info">{{ $sale->quantity }}</span></td>
                                <td class="text-end">₹ {{ number_format($sale->sale_price, 2) }}</td>
                                <td class="text-end fw-bold">₹ {{ number_format($sale->quantity * $sale->sale_price, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-3 text-muted">No sales data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-soft">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Top Selling Products</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead>
                            <tr class="text-muted small">
                                <th>Product</th>
                                <th class="text-center">Sold</th>
                                <th class="text-end">Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topProducts ?? [] as $product)
                            <tr>
                                <td class="fw-bold small">{{ $product->name }}</td>
                                <td class="text-center"><span class="badge bg-success">{{ $product->sales_count ?? 0 }}</span></td>
                                <td class="text-end">₹ {{ number_format($product->total_revenue ?? 0, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">No sales data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card card-soft">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Stock Status</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead>
                            <tr class="text-muted small">
                                <th>Product</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lowStockProducts ?? [] as $product)
                            <tr>
                                <td class="fw-bold small">{{ $product->name }}</td>
                                <td class="text-center">{{ $product->stock }}</td>
                                <td class="text-center">
                                    @if($product->stock == 0)
                                    <span class="badge bg-danger">Out</span>
                                    @else
                                    <span class="badge bg-warning text-dark">Low</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">All products in stock</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-soft">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Category Performance</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead>
                            <tr class="text-muted small">
                                <th>Category</th>
                                <th class="text-center">Products</th>
                                <th class="text-end">Total Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories ?? [] as $category)
                            <tr>
                                <td class="fw-bold small">{{ $category->name }}</td>
                                <td class="text-center"><span class="badge bg-primary">{{ $category->products_count ?? 0 }}</span></td>
                                <td class="text-end">{{ $category->total_stock ?? 0 }} units</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">No data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function exportCSV() {
        alert('Export to CSV feature coming soon!');
    }
</script>

@endsection