<x-users.main.app-layout>
    <x-slot name="head">
        - Admins
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Dashboard</x-slot>
    </x-admin.banners>
                            
    <!-- Card Start -->


    <div class="row bs-g-2 bg-1" role="list">
        <div class="error-rows" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header pb-0">
                    <h6 class="mt-0 d-flex">Weekly Feedback</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        @php
                            if($totalPreviousWeekFeedback != 0)
                            {
                                $percentageChange = ($totalCurrentWeekFeedback - $totalPreviousWeekFeedback) / ($totalCurrentWeekFeedback + $totalPreviousWeekFeedback) * 100;
                                $percentageChange = min($percentageChange, 100);
                            }elseif($totalPreviousWeekFeedback == 0 && $totalCurrentWeekFeedback == 0) {
                                $percentageChange = 0;
                            }else{
                                $percentageChange = 100;
                            }
                           $class = $percentageChange < 0 ? 'danger' : 'success';
                        @endphp
                        <div class="colun">
                            <p class="dashboard-card-head">{{ $totalCurrentWeekFeedback }}</p>
                            <span class="card-badge dashboard-card-badge {{ $class }}">{{ number_format($percentageChange, 1) }}%</span>
                        </div>
                        <div class="colun-auto">
                            <div class="e-bar-chart">
                                <canvas id="chart-bars-sales" class="chart-canvas" height="76" width="176"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="error-rows" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header pb-0">
                    <h6 class="mt-0 d-flex">Monthly User Registrations</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        <div class="colun">
                           @php
                                $currentMonth = date('n');
                                $previousMonth = $currentMonth - 1 ?: 12;
                                $totalRegistrationsThisMonth = $monthlyData[$currentMonth] ?? 0;
                                $totalRegistrationsPreviousMonth = $monthlyData[$previousMonth] ?? 0;
                                $percentageChange = $totalRegistrationsPreviousMonth != 0 
                                                    ? (($totalRegistrationsThisMonth - $totalRegistrationsPreviousMonth) / ($totalRegistrationsThisMonth + $totalRegistrationsPreviousMonth)) * 100 
                                                    : 100;
                                $class = $percentageChange < 0 ? 'danger' : 'success';
                            @endphp

                            <p class="dashboard-card-head">{!! $totalRegistrationsThisMonth !!}</p>
                            <span class="card-badge dashboard-card-badge {!! $class !!}">{{ number_format($percentageChange, 1) }}%</span>
                        </div>
                        <div class="colun-auto">
                            <div class="e-bar-chart">
                                <canvas id="chart-lines-registration" class="chart-canvas" height="76" width="136"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="error-rows" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header pb-0">
                    <h6 class="mt-0 d-flex">Monthly Rentals</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        <div class="colun">
                            @php
                                $percentageChange = $totalRentalsPreviousMonth != 0 
                                                    ? (($totalRentalsThisMonth - $totalRentalsPreviousMonth) / ($totalRentalsThisMonth + $totalRentalsPreviousMonth)) * 100 
                                                    : 100;
                                $class = $percentageChange < 0 ? 'danger' : 'success';
                            @endphp
                        
                            <p class="dashboard-card-head">{!! $totalRentalsThisMonth !!}</p>
                            <span class="card-badge dashboard-card-badge {!! $class !!}">{{ number_format($percentageChange, 1) }}%</span>
                        </div>
                        
                        <div class="colun-auto">
                            <div class="e-bar-chart">
                                <canvas id="chart-lines-rentals" class="chart-canvas" height="76" width="136"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="error-rows" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header pb-0">
                    <h6 class="mt-0 d-flex">Maintenance Requests</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        <div class="colun">
                            <p class="dashboard-card-head">{!! $currentMonthRequests !!}</p>
                        </div>
                        <div class="colun-auto">
                            <div class="e-bar-chart">
                                <canvas id="chart-pie-new-tenant" class="chart-canvas" height="76" width="136"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- Card End -->

    <!-- Plot Start -->
    <div class="row bs-0" role="list">
        <div class="error-rows dash-plot" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header card-center ptb-1-2">
                    <h6 class="mb-0">Yearly User Distribution</h6>
                </div>
                <div class="card-dashboard-body ptb-1-2">
                    <div class="e-bar-chart">
                        <canvas id="rolesDistributionChart" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="error-rows dash-plot" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header card-center ptb-1-2">
                    <h6 class="mb-0">Rating Comparison</h6>
                    <div class="p-r">
                        <a class="status-links view-btn ptb-1-2" href="{!! route('admin.rates.index') !!}">View Details</a>
                    </div>
                </div>
                <div class="card-dashboard-body ptb-1-2">
                    <div class="e-bar-chart">
                        <canvas id="chart-line-ratings" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="error-rows dash-plot full-width" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header card-center ptb-1-2">
                    <h6 class="mb-0">Revenue Comparison</h6>
                    <div class="p-r">
                        <a class="status-links view-btn ptb-1-2" href="{!! route('payment.index') !!}">View Details</a>
                    </div>
                </div>
                <div class="card-dashboard-body ptb-1-2">
                    <div class="e-bar-chart">
                        <canvas id="chart-bars-year-lines" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- Plot End -->


    <x-landlords.footer />                

    <x-slot name="scripts">
        <script>
            var ctx = document.getElementById("chart-bars-sales").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["S", "M", "T", "W", "T", "F", "S"],
                    datasets: [{
                    label: "Customer Feedback",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#06b6d4",
                    data: [
                        @foreach ($currentWeeklyFeedback as $payment)
                            {{ $payment }},
                        @endforeach
                    ],
                    maxBarThickness: 6
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'transparent'
                        },
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'transparent'
                        },
                    },
                    },
                },
            });

            var ctx1 = document.getElementById("chart-lines-registration").getContext("2d");

            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                    datasets: [{
                        label: "Registrations",
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 0,
                        backgroundColor: "transparent",
                        borderColor: "#06b6d4",
                        data: [
                            @foreach(range(1, 12) as $month)
                                {{ $monthlyData[$month] ?? 0 }},
                            @endforeach
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'transparent'
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'transparent'
                            },
                        },
                    },
                },
            });

            var ctx2 = document.getElementById("chart-lines-rentals").getContext("2d");

            new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                    datasets: [{
                        label: "Registrations",
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 0,
                        backgroundColor: "transparent",
                        borderColor: "#06b6d4",
                        data: [
                            @foreach(range(1, 12) as $month)
                                {{ $monthlyConfirmedRentals[$month] ?? 0 }},
                            @endforeach
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'transparent'
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'transparent'
                            },
                        },
                    },
                },
            });
            var ctx3 = document.getElementById('chart-pie-new-tenant').getContext('2d');
            new Chart(ctx3, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        label: 'Maintenance Requests',
                        backgroundColor: ['#3d3975', '#696694'],
                        data: [
                            {!! json_encode($previousMonthRequests) !!}, 
                            {!! json_encode($currentMonthRequests) !!}
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                },
            });
            var ctx4 = document.getElementById('rolesDistributionChart').getContext('2d');
            var rolesDistributionChart = new Chart(ctx4, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Tenants',
                        data: {!! json_encode(array_values($monthlyRoleData['tenant'])) !!},
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Landlords',
                        data: {!! json_encode(array_values($monthlyRoleData['landlord'])) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
            var ctx5 = document.getElementById('chart-line-ratings').getContext('2d');
            var ratingsChart = new Chart(ctx5, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Average Ratings',
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 0,
                        data: {!! json_encode(array_values($monthlyRatings)) !!},
                        backgroundColor: 'transparent',
                        borderColor: '#06b6d4',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 5
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

        </script> 
    </x-slot>
</x-users.main.app-layout>