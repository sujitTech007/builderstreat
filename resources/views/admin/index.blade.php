@include('admin.include.header')

<div class="page-content">


    <div class="page-container p-3">
        <div class="container py-1">
            <div class="row">

                <!-- Total Buyers -->
                <div class="col-lg-4">
                    <a href="{{ route('admin.buyers') }}">
                        <div class="card h-50 text-center shadow">
                            <div class="card-body custom-card-body card-body-users">
                                <div class="growth-text">
                                    <p class="card-text mb-0 card-text-users">Total Buyers</p>
                                    <h5 class="card-title mb-1 card-title-users">{{ $buyerCount }}</h5>
                                </div>
                                <div class="icon-box display-4 text-primary mb-2">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

                <!-- Total Sellers -->
                <div class="col-lg-4">
                    <a href="{{ route('admin.sellers') }}">
                        <div class="card h-50 text-center shadow">
                            <div class="card-body custom-card-body card-body-growth">
                                <div class="growth-text">
                                    <p class="card-text mb-0 card-text-growth">Total Sellers</p>
                                    <h5 class="card-title mb-1 card-title-growth">{{ $sellerCount}}</h5>
                                </div>
                                <div class="icon-box display-4 text-success mb-2">
                                    <i class="bi bi-person-badge-fill"></i> <!-- ✅ Changed: more seller-appropriate icon -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Total RFQ -->
                <div class="col-lg-4">
                    <a href="{{ route('admin.enquiries') }}">
                        <div class="card h-50 text-center shadow">
                            <div class="card-body custom-card-body card-body-rating">
                                <div class="growth-text">
                                    <p class="card-text mb-0 card-text-rating">Total Payments</p>
                                    <h5 class="card-title mb-1 card-title-rating">{{ $orderPaymentCount }}</h5>
                                </div>
                                <div class="icon-box display-4 text-warning mb-2">
                                    <i class="bi bi-wallet"></i>
                                    <!-- ✅ Changed: better for "Requests for Quotation" -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Approved Sellers -->
                

            </div>
            <div class="row">
                
                <div class="col-lg-4">
                    <a href="{{ route('admin.sellers.approved',  ['status' => 'approved']) }}">
                        <div class="card h-50 text-center shadow">
                            <div class="card-body custom-card-body card-body-uptime">
                                <div class="growth-text">
                                    <p class="card-text mb-0 card-text-uptime">Approved Sellers</p>
                                    <h5 class="card-title mb-1 card-title-uptime">{{ $activeSellerCount }}</h5>
                                </div>
                                <div class="icon-box display-4 text-danger mb-2">
                                    <i class="bi bi-check-circle-fill"></i> <!-- ✅ Already correct -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-4">
                    <a href="{{ route('admin.sellers.approved',  ['status' => 'rejected']) }}">
                        <div class="card h-50 text-center shadow">
                            <div class="card-body custom-card-body card-body-uptime">
                                <div class="growth-text">
                                    <p class="card-text mb-0 card-text-uptime">Rejected Sellers</p>
                                    <h5 class="card-title mb-1 card-title-uptime">{{ $rejectedSellerCount }}</h5>
                                </div>
                                <div class="icon-box display-4 text-danger mb-2">
                                    <i class="bi bi-x-circle-fill"></i> <!-- ✅ Already correct -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="card h-50 text-center shadow">
                        <div class="card-body custom-card-body card-body-uptime">
                            <div class="growth-text">
                                <p class="card-text mb-0 card-text-uptime">Total RFQ's</p>
                                <h5 class="card-title mb-1 card-title-uptime">{{ $RfqsCount }}</h5>
                            </div>
                            <div class="icon-box display-4 text-danger mb-2">
                                <i class="bi bi-receipt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="row mt-4">
                <!-- Bar Chart -->
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Dashboard Overview (Bar)</h5>
                            <canvas id="dashboardBarChart" height="100"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Doughnut Chart -->
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Dashboard Overview (Doughnut)</h5>
                            <canvas id="dashboardDoughnutChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const barCtx = document.getElementById('dashboardBarChart').getContext('2d');
    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Buyers','Sellers','Inquiries','Approved Sellers','Rejected Sellers','RFQs'],
            datasets: [{
                label: 'Count',
                data: [
                    {{ $buyerCount }},
                    {{ $sellerCount }},
                    {{ $inquiryCount }},
                    {{ $activeSellerCount }},
                    {{ $rejectedSellerCount }},
                    {{ $RfqsCount }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(40, 167, 69, 0.7)',
                    'rgba(220, 53, 69, 0.7)',
                    'rgba(153, 102, 255, 0.7)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(220, 53, 69, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
        }
    });

    const doughnutCtx = document.getElementById('dashboardDoughnutChart').getContext('2d');
    const doughnutChart = new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Buyers','Sellers','Inquiries','Approved Sellers','Rejected Sellers','RFQs'],
            datasets: [{
                label: 'Count',
                data: [
                    {{ $buyerCount }},
                    {{ $sellerCount }},
                    {{ $inquiryCount }},
                    {{ $activeSellerCount }},
                    {{ $rejectedSellerCount }},
                    {{ $RfqsCount }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(40, 167, 69, 0.7)',
                    'rgba(220, 53, 69, 0.7)',
                    'rgba(153, 102, 255, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 255, 255, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: { enabled: true }
            }
        }
    });
</script>

@include('admin.include.footer')