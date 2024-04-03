@php
    if(Route::currentRouteName() == 'tenant.dashboard'){
        $property_types = App\Models\Unit::latest()->take(4)->get();
    }else {
        $property_types = App\Models\Unit::latest()->get();
    }
@endphp
<!-- Start Property Types Details -->
<section class="houseDetails" id="Landlords-details-focus">
    <div class="container p5">
        <div class="service-grid" role="list">
            <div class="service-grid" role="listitem">
                <div class="housing-container">
                    <div class="housing-wrapper mb-3">
                        <div class="hero-content housing-content-center housing-detail plr-4">
                            <h2 class="text-center">Meet the E-Rent Property Type</h2>
                            <div class="hero-content text-left">
                                <p class="paragraph text-center">Simplify property operations from lead to lease to renewal—and everything in between.</p>
                            </div>
                        </div>

                        <div class="hero-content">
                            <div class="property-types">
                                <div class="property-types-container" role="list">
                                    @forelse ($property_types as $property_type)
                                        <div class="property-type-block" role="listitem">
                                            <a href="../Errors/404Error.html" class="property-type-links inline-block">
                                                <div class="property-types-wrapper text-center">
                                                    <div class="property-type-icons-wrapper">
                                                        <img src="{!! asset($property_type->image_1) !!}" alt="type Icon" loading="lazy" class="property-type-icons">
                                                    </div>
                                                    <div class="hero-content is-property-content text-left">
                                                        <div class="hero-content is--property-content text-left">
                                                            <div class="heading-types">{!! $property_type->building_unit !!}</div>
                                                            <div class="text-service-paragraph is-paragraph">{!! $property_type->description !!}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                        <div class="property-type-block text-center" role="listitem">Coming Soon</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Property Types Details -->