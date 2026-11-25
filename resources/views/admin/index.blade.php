@include('admin.include.header')

<main class="content">
<div class="page-content">
     <div class="d-flex justify-content-between align-items-center mb-4 page-head">
        <div>
            <h1 class="mb-1">Dashboard</h1>
            <p class="text-muted mb-0">
                Users, material approvals, orders and marketplace activity.
            </p>
        </div>

        <div>
            <a href="materials/pending.html" class="btn btn-primary">
                <i class="fa-solid fa-clock-rotate-left me-1"></i>
                Review Pending Lots
            </a>
        </div>
    </div>


  
            
<div class="row g-4 mb-4">

    <!-- Total Buyers -->
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.buyers') }}" class="text-decoration-none">
            <div class="card border-0 shadow-none h-100 card_chart">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Buyers</p>
                            <h3 class="mb-1">{{ $buyerCount }}</h3>
                        </div>
                        <div class="fs-1 text-primary">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Total Sellers -->
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.sellers') }}" class="text-decoration-none">
            <div class="card border-0 shadow-none h-100 card_chart">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Sellers</p>
                            <h3 class="mb-1">{{ $sellerCount }}</h3>
                        </div>
                        <div class="fs-1 text-success">
                            <i class="fa-solid fa-store"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Total Payments -->
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.enquiries') }}" class="text-decoration-none">
            <div class="card border-0 shadow-none h-100 card_chart">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Payments</p>
                            <h3 class="mb-1">{{ $orderPaymentCount }}</h3>
                        </div>
                        <div class="fs-1 text-warning">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Approved Sellers -->
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.sellers.approved', ['status' => 'approved']) }}" class="text-decoration-none">
            <div class="card border-0 shadow-none h-100 card_chart">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Approved Sellers</p>
                            <h3 class="mb-1">{{ $activeSellerCount }}</h3>
                        </div>
                        <div class="fs-1 text-success">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Rejected Sellers -->
    <div class="col-xl-3 col-md-6">
        <a href="{{ route('admin.sellers.approved', ['status' => 'rejected']) }}" class="text-decoration-none">
            <div class="card border-0 shadow-none h-100 card_chart">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Rejected Sellers</p>
                            <h3 class="mb-1">{{ $rejectedSellerCount }}</h3>
                        </div>
                        <div class="fs-1 text-danger">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Total RFQs -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-none h-100 card_chart">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-2">Total RFQ's</p>
                        <h3 class="mb-1">{{ $RfqsCount }}</h3>
                    </div>
                    <div class="fs-1 text-info">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row g-4 mb-4">

        <!-- Sales Overview -->
        <div class="col-xl-8">
            <div class="card border-1 shadow-none h-100">
                <div class="card-header bg-white border-0 p-0 mb-2">
                    <h5 class="mb-1">Marketplace Performance Overview</h5>
                            <p class="text-muted small mb-0">
                                Monthly Marketplace Performance Trends
                            </p>
                </div>

                <div class="card-body" style="height: 300px;">
                    <canvas id="dashboardBarChart" height="100"></canvas>
                </div>
            </div>
        </div>


        <!-- User Overview -->
        <div class="col-xl-4">
            <div class="card border-1 shadow-none h-100 bg-success bg-opacity-25">
                <div class="card-header bg-transparent border-0 pt-1 mb-2 px-2">
                    <h5 class="mb-1">Marketplace Distribution</h5>
                    <p class="text-muted small mb-0">Marketplace Category Distribution</p>
                </div>

                <div class="card-body p-0" style="height: 250px;">
                    <canvas id="dashboardDoughnutChart" height="100"></canvas>
                </div>
            </div>
        </div>

    </div>

    


    <!-- Recent Orders -->
    <div class="card border-0 shadow-none mb-4 p-0">

        <div class="card-header bg-white border-0 pt-4 px-0">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">
                        <i class="fa-solid fa-box me-2 text-primary"></i>
                        Recent Orders
                    </h5>

                    <p class="text-muted small mb-0">
                        Latest marketplace transactions
                    </p>
                </div>

                <a href="orders/index.html"
                   class="btn btn-sm btn-outline-primary">
                    View All
                </a>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
            <th>Enquiry ID</th>
            <th>Buyer</th>
            <th>Seller</th>
            <th>Material</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Payment Status</th>
            <th>Created At</th>
                        </tr>
                    </thead>

                    <tbody>
                        

                        <tr>
                            <td class="fw-semibold">#BT-10245</td>
                            <td>INQ038</td>
                            <td>ABC Construction</td>
                            <td>XD Builder</td>
                            <td>Steel Rods</td>
                             <td>100Nos</td>
                            <td>$12,000.00</td>
                            <td>
                                <span class="badge bg-warning text-warning bg-opacity-10 p-2">
                                    Pending
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-danger text-danger bg-opacity-25 p-2">
                                    Unpaid
                                </span>
                            </td>
                            <td>11 Oct 2025</td>
                        </tr>


                        
                    </tbody>

                </table>

            </div>
        </div>
    </div>



    </div>
</main>
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