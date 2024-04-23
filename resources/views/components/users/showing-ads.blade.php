@php
    $advertising = App\Models\Advertising::first();
@endphp
<!-- Start Landlord and Tenants Joining Ads -->
<section class="tenantsLandlord-joining-ads">
    <div class="ads-container">
        <div class="ads--row">
            <div class="tenantsLandlord-sub-container">
                <div class="tenantsLandlord-column-wrap">
                    <div class="tenantsLandlord-widget-ads">
                        <section class="tenantsLandlord-section">
                            <div class="ads-container">
                                <div class="ads--row">
                                    <div class="col-66">
                                        <div class="tenantsLandlord-section ads-populated">
                                            <div class="tenantsLandlord-widget-ads">
                                                <div class="ads-header">
                                                    <div class="ads-widget-container">
                                                        <h2 class="ads-heading-title">{!! $advertising->title !!}</h2>
                                                    </div>
                                                </div>
                                                <div class="ads-header">
                                                    <div class="ads-widget-container">
                                                        <p class="ads-sub-heading-title">{!! $advertising->description !!}</p>
                                                    </div>
                                                </div>
                                                <div class="ads-header">
                                                    <div class="ads-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a href="{!! route('user.register') !!}" target="_blank" class="btnSecondary navButton">Join Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-33">
                                        <div class="ads--row p-r">
                                            <div class="tenantsLandlord-widget-ads">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Landlord and Tenants Joining Ads -->