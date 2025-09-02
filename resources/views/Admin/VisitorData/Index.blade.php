<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4">

        <!-- Stats -->
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3 h-100">
                <h6>Total Visitors</h6>
                <p class="fw-bold text-primary fs-4">{{ $totalVisitors }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3 h-100">
                <h6>Last 24 Hours</h6>
                <p class="fw-bold text-success fs-4">{{ $last24Hours }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3 h-100">
                <h6>Last 1 Hour</h6>
                <p class="fw-bold text-danger fs-4">{{ $last1Hour }}</p>
            </div>
        </div>

        <!-- Chart -->
        <div class="col-12">
            <div class="card shadow-sm p-3">
                <h5 class="mb-3">Visitor Activity</h5>
                <canvas id="visitorsChart" height="100"></canvas>
            </div>
        </div>

        <!-- Visitors Table -->
        <div class="col-12">
            <div class="card shadow-sm p-3">
                <h5 class="mb-3">Recent Visitors</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>IP</th>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Visit Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitors as $visitor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $visitor->ip_address }}</td>
                                    <td>{{ $visitor->device }}</td>
                                    <td>{{ getLocationFromIp($visitor->ip_address) }}</td>
                                    <td>{{ $visitor->latest_visit_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $visitors->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitorsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($visitorsChart->pluck('date')),
            datasets: [{
                label: 'Visitors',
                data: @json($visitorsChart->pluck('count')),
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Visitors'
                    }
                }
            }
        }
    });
</script>
