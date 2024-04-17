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
                            @php
                                $currentMonth = date('n');
                                $previousMonth = ($currentMonth - 1 > 0) ? $currentMonth - 1 : 12;
                                $totalRequestsThisMonth = isset($monthlyData[$currentMonth]) ? $monthlyData[$currentMonth] : 0;
                                $totalRequestsPreviousMonth = isset($monthlyData[$previousMonth]) ? $monthlyData[$previousMonth] : 0;
                                $percentageChange = ($totalRequestsPreviousMonth != 0) ? (($totalRequestsThisMonth - $totalRequestsPreviousMonth) / $totalRequestsPreviousMonth) * 100 : 100;
                                $class = $percentageChange < 0 ? 'danger' : 'success';
                            @endphp

                            <p class="dashboard-card-head">{!! $totalRequestsThisMonth !!}</p>
                            <span class="card-badge dashboard-card-badge {!! $class !!}">{{ number_format($percentageChange, 1) }}%</span>
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
                    <h6 class="mb-0">Active Tenants</h6>
                </div>
                <div class="card-dashboard-body ptb-1-2">
                    @foreach ($tenants as $tenant)
                        <div class="d-flex align-center p-r mb-1">
                            <div class="avatar-img status">
                                <img src="{!! $tenant->image !!}" alt="Avatar">
                            </div>
                            <div class="avatar-flex">
                                <h6 class="mb-0">
                                    <form action="{!! route('landlord.viewFriend') !!}" method="POST">
                                        @csrf
                                        <input type="hidden" name="tenantID" value="{!! $tenant->id !!}" />
                                        <input class="b-e-0" type="submit" value="{!! $tenant->first_name !!} {!! $tenant->last_name !!}" style="padding: 0" />
                                    </form>    
                                </h6>
                                <p class="avatar-par mb-0">{!! $tenant->address !!}</p>
                            </div>
                        </div> 
                    @endforeach
                    

                </div>
                <div class="card-dashboard-footer p-0 text-center">
                    <a class="status-links view-btn ptb-1-2" href="{!! route('landlord.tenant.active.index') !!}">All active users</a>
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
                label: "Request",
                tension: 0.4,
                borderWidth: 2,
                pointRadius: 0,
                backgroundColor: "transparent",
                borderColor: "#06b6d4",
                data: [
                    @foreach(range(1, 12) as $month)
                        {{ isset($monthlyData[$month]) ? $monthlyData[$month] : 0 }},
                    @endforeach
                ],
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