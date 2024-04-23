@php
    $landlordCount = App\Models\User::where('roles', '2')->count();
    $currentYear = Carbon\Carbon::now()->year;
    $previousYear = Carbon\Carbon::now()->subYear()->year;
    $currentYearUsers = App\Models\User::whereYear('created_at', $currentYear)->count();
    $previousYearUsers = App\Models\User::whereYear('created_at', $previousYear)->count();
    if ($previousYearUsers > 0) {
        $growth = (($currentYearUsers - $previousYearUsers) / $previousYearUsers) * 100;
    } else {
        $growth = $currentYearUsers > 0 ? 100 : 0;
    }
@endphp
<!-- Elements -->
<section class="elementorSection"> 
    <div class="container elements">
        <div class="elementor-row">
            <div class="banner pt-2">
                <div class="hero-banner for-mobiles">
                    <div class="col-50 hero-left hero">
                        <div class="hero-container pr-5t">
                            <div class="hero-content hero gap-2m">
                                <div class="hero-header">
                                    <h1 class="hero-header-text">Adventure Begins Here</h1>
                                </div>
                                <p class="paragraph for-mobiles">Gear up for thrilling adventures and outdoor escapades that await just around the corner.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-50 hero-right hero">
                        <div class="elementor-wrapper">
                            <div class="elementor-inner-section">
                                <div class="elementor-content">
                                    <div class="elementor-icons">
                                        <div
                                            class="elementor-icons-wrapper">
                                            <div
                                                class="elementor-wrapper">
                                                <div
                                                    class="elementor-icons-image">
                                                    <img
                                                        src="{!! asset('Images/Original/tick-circle.svg') !!}"
                                                        alt="tick"
                                                        width="100"
                                                        height="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-inner-contents">
                                        <div
                                            class="elementor-icons-wrapper">
                                            <div class="elementor-wrapper">
                                                <div class="elementor-header">
                                                    <p class="elementor-header-size">{{ number_format($growth, 0) }}% more user</p>
                                                    <p class="elementor-header-paragraph">than the previous year</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-inner-section">
                                <div class="elementor-content">
                                    <div class="elementor-icons">
                                        <div
                                            class="elementor-icons-wrapper">
                                            <div
                                                class="elementor-wrapper">
                                                <div
                                                    class="elementor-icons-image">
                                                    <img
                                                        src="{!! asset('Images/Original/tick-circle.svg') !!}"
                                                        alt="tick"
                                                        width="100"
                                                        height="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-inner-contents">
                                        <div
                                            class="elementor-icons-wrapper">
                                            <div
                                                class="elementor-wrapper">
                                                <div
                                                    class="elementor-header">
                                                    <p
                                                        class="elementor-header-size">{!! $landlordCount !!}+
                                                        owners</p>
                                                    <p
                                                        class="elementor-header-paragraph">WITH
                                                        THRIVING
                                                        PROPERTIES</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-inner-section">
                                <div class="elementor-content">
                                    <div class="elementor-icons">
                                        <div
                                            class="elementor-icons-wrapper">
                                            <div
                                                class="elementor-wrapper">
                                                <div
                                                    class="elementor-icons-image">
                                                    <img
                                                        src="{!! asset('Images/Original/tick-circle.svg') !!}"
                                                        alt="tick"
                                                        width="100"
                                                        height="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-inner-contents">
                                        <div
                                            class="elementor-icons-wrapper">
                                            <div
                                                class="elementor-wrapper">
                                                <div
                                                    class="elementor-header">
                                                    <p
                                                        class="elementor-header-size">4.7
                                                        stars</p>
                                                    <p
                                                        class="elementor-header-paragraph">EARNED
                                                        FROM GUESTS ON
                                                        AVERAGE</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Elements -->