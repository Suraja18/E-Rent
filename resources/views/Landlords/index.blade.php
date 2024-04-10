<x-users.main.app-layout>
    <x-slot name="head">
        - Landlords
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Dashboard</x-slot>
    </x-landlords.banners>
                            
    <!-- Card Start -->
    <div class="row bs-g-2 bg-1" role="list">
        <div class="error-rows" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header pb-0">
                    <h6 class="mt-0 d-flex">Weekly Revenue</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        @php
                            if($totalPreviousWeekPayment != 0)
                            {
                                $percentageChange = ($totalWeekPayment - $totalPreviousWeekPayment) / $totalPreviousWeekPayment * 100;
                                $percentageChange = min($percentageChange, 100);
                            }else {
                                $percentageChange = 100;
                            }
                           $class = $percentageChange < 0 ? 'danger' : 'success';
                        @endphp
                        <div class="colun">
                            <p class="dashboard-card-head">Rs {{ number_format($totalWeekPayment, 2, '.', ',') }}</p>
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
                    <h6 class="mt-0 d-flex">Monthly Maintenance Request</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        <div class="colun">
                            <p class="dashboard-card-head">2</p>
                            <span class="card-badge dashboard-card-badge danger">1.6%</span>
                        </div>
                        <div class="colun-auto">
                            <div class="e-bar-chart">
                                <canvas id="chart-lines-request" class="chart-canvas" height="76" width="136"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="error-rows" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header pb-0">
                    <h6 class="mt-0 d-flex">New Tenants</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        @php
                            if ($previousMonthActiveTenants != 0) {
                                $percentageChangeTenant = ($currentMonthActiveTenants - $previousMonthActiveTenants) / $previousMonthActiveTenants * 100;
                                $percentageChangeTenant = min($percentageChangeTenant, 100);
                            } else {
                                $percentageChangeTenant = 100; 
                            }
                            $classTenant = $percentageChangeTenant < 0 ? 'danger' : 'success';
                        @endphp
                        <div class="colun">
                            <p class="dashboard-card-head">{!! $currentMonthActiveTenants !!}</p>
                            <span class="card-badge dashboard-card-badge {!! $classTenant !!}">{!! $percentageChangeTenant !!}%</span>
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
        <div class="error-rows" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header pb-0">
                    <h6 class="mt-0 d-flex">Vacant Property</h6>
                </div>
                <div class="card-dashboard-body">
                    <div class="row">
                        <div class="colun">
                            <p class="dashboard-card-head">{!! $vacantProperties !!}</p>
                        </div>
                        <div class="colun-auto">
                            <div class="e-bar-chart">
                                <canvas id="chart-pie-tenant" class="chart-canvas" height="76" width="136"></canvas>
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
                    <h6 class="mb-0">Active Users</h6>
                    <div class="p-r">
                        <button type="button" class="view-more-link">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="card-dashboard-body ptb-1-2">
                    <div class="d-flex align-center p-r mb-1">
                        <div class="avatar-img status-online">
                            <img src="../Images/Variable/Person/1.jpg" alt="Avatar">
                        </div>
                        <div class="avatar-flex">
                            <h6 class="mb-0">
                                <a href="#">Emma Watson</a>
                            </h6>
                            <p class="avatar-par mb-0">Tenants</p>
                        </div>
                    </div>
                    <div class="d-flex align-center p-r mb-1">
                        <div class="avatar-img">
                            <img src="../Images/Variable/Person/2.jpg" alt="Avatar">
                        </div>
                        <div class="avatar-flex">
                            <h6 class="mb-0">
                                <a href="#">Antony Hopkins</a>
                            </h6>
                            <p class="avatar-par mb-0">Landlord</p>
                        </div>
                    </div>
                    <div class="d-flex align-center p-r mb-1">
                        <div class="avatar-img">
                            <img src="../Images/Variable/Person/1.jpg" alt="Avatar">
                        </div>
                        <div class="avatar-flex">
                            <h6 class="mb-0">
                                <a href="#">John Lee</a>
                            </h6>
                            <p class="avatar-par mb-0">Tenants</p>
                        </div>
                    </div>
                    <div class="d-flex align-center p-r mb-1">
                        <div class="avatar-img status-online">
                            <img src="../Images/Variable/Person/2.jpg" alt="Avatar">
                        </div>
                        <div class="avatar-flex">
                            <h6 class="mb-0">
                                <a href="#">Rowen Atkinson</a>
                            </h6>
                            <p class="avatar-par mb-0">Landlord</p>
                        </div>
                    </div>
                </div>
                <div class="card-dashboard-footer p-0 text-center">
                    <a class="status-links view-btn ptb-1-2" href="#">All active users</a>
                </div>
            </div>
        </div>
        <div class="error-rows dash-plot" role="listitem">
            <div class="card-dashboard">
                <div class="card-dashboard-header card-center ptb-1-2">
                    <h6 class="mb-0">Yearly Tenants Comparison</h6>
                    <div class="p-r">
                        <a class="status-links view-btn ptb-1-2" href="{!! route('landlord.tenant.active.index') !!}">View Details</a>
                    </div>
                </div>
                <div class="card-dashboard-body ptb-1-2">
                    <div class="e-bar-chart">
                        <canvas id="chart-bars-year-tenant" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="error-rows dash-plot full-width" role="listitem">
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
        </div>
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
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#06b6d4",
                // borderColor: "#06b6d4",
                data: [
                    @foreach ($weeklyPayments as $payment)
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


            var ctx1 = document.getElementById("chart-lines-request").getContext("2d");

            new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                datasets: [{
                label: "Tenants",
                tension: 0.4,
                borderWidth: 2,
                pointRadius: 0,
                backgroundColor: "transparent",
                borderColor: "#06b6d4",
                data: [5, 25, 15, 6, 2, 1, 0, 0, 0, 2, 4, 2],
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

            var ctx2 = document.getElementById("chart-pie-new-tenant").getContext("2d");

            new Chart(ctx2, {
                type: "doughnut", 
                data: {
                    labels: ["Previous Month", "Current Month"],
                    datasets: [{
                        label: "Yearly Tenants",
                        backgroundColor: ["#3d3975", "#696694"],
                        data: [{!! $previousMonthActiveTenants !!}, {!! $currentMonthActiveTenants !!}],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: false
                        }
                    }
                },
            });

            var ctx3 = document.getElementById("chart-pie-tenant").getContext("2d");
            var vacantProperties = {!! $vacantProperties !!};
            var occupiedProperties = {!! $occupiedProperties !!};

            new Chart(ctx3, {
                type: "doughnut",
                data: {
                    labels: ["Occupied", "Vacant"],
                    datasets: [{
                        label: "Property Status",
                        backgroundColor: ["#3d3975", "#696694"],
                        data: [occupiedProperties, vacantProperties],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: false
                        }
                    }
                },
            });

            var ctx4 = document.getElementById("chart-bars-year-tenant").getContext("2d");

            new Chart(ctx4, {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                label: "Tenant",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#06b6d4",
                data: {!! $YearlyTenant !!},
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
            var ctx5 = document.getElementById("chart-bars-year-lines").getContext("2d");

            new Chart(ctx5, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: {!! $currentYear !!},
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 2,
                    backgroundColor: "transparent",
                    borderColor: "#06b6d4",
                    data: {!! $currentYearRevenue !!}, 
                },
                {
                    label: {!! $previousYear !!},
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 2,
                    backgroundColor: "transparent",
                    borderColor: "#00c389",
                    data: {!! $previousYearRevenue !!}, 
                },
                {
                    label: {!! $previousPreviousYear !!},
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 2,
                    backgroundColor: "transparent",
                    borderColor: "#eb3d3d",
                    data: {!! $previousPreviousYearRevenue !!}, 
                },
             ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: true,
                    position: "top",
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

        </script>
    </x-slot>
</x-users.main.app-layout>