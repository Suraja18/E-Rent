@php
    if(Route::currentRouteName() == 'tenant.dashboard'){
        $property_rents = App\Models\RentProperty::latest()
                        ->where('status', 'Yes')
                        ->whereNotIn('id', function ($query) {
                            $query->select('rent_id')
                                ->from('rented_properties')
                                ->where('status', '<>', 'Cancelled')
                                ->orWhereNull('deleted_at');
                        })
                        ->take(4)
                        ->get()
                        ->shuffle();
    } elseif (isset($properties)) {
        $property_rents = $properties;
    } elseif (isset($propertiee)) {
        $property_rents = $propertiee;
    } else {
        $property_rents = App\Models\RentProperty::latest()
                        ->where('status', 'Yes')
                        ->whereNotIn('id', function ($query) {
                            $query->select('rent_id')
                                ->from('rented_properties')
                                ->where('status', '<>', 'Cancelled')
                                ->orWhereNull('deleted_at');
                        })
                        ->get()
                        ->shuffle();
    }
@endphp

 
 <!-- Start House Details -->
 <section class="houseDetails" id="allPropertyDetail">
    <div class="container p5 @if(isset($propertiee)) no-pt @endif">
        <div class="service-grid" role="list">
            <div class="service-grid" role="listitem">
                <div class="housing-container">
                    <div class="housing-wrapper">
                        @if(!isset($propertiee))
                        <div class="hero-content housing-content-center housing-detail plr-4">
                            <h2 class="text-center">Meet the E-Rent
                                Property for your happy place</h2>
                            <div class="hero-content text-left">
                                <p class="paragraph text-center">
                                    Simplify property operations from
                                    lead to lease to renewal—and
                                    everything in between.
                                </p>
                            </div>
                        </div>
                        @endif
                        <div class="hero-content">
                            <div class="housing-list">
                                <div class="housing-grid" role="list">
                                    @forelse ($property_rents as $property)
                                        <div class="housing-grid-list-items wow fadeInUp"data-wow-delay="0.1s" role="listitem">
                                            <div class="housing-grid-list-container">
                                                <div class="housing-image-container">
                                                    @php
                                                        if($property->type == 'Rent'){
                                                            $slug = $property->slug;
                                                        }elseif ($property->type == 'Sell') {
                                                            $slug = $property->building->slug;
                                                        }
                                                    @endphp
                                                    <a href="{!! route('tenant.propertyDetail', $slug) !!}"><img class="img-fluid" src=" @if($property->type == 'Rent') {!! asset($property->image_1) !!} @elseif($property->type == 'Sell') {!! asset($property->building->image_1) !!} @endif" alt></a>
                                                    <div class="btnPrimary navButton image-top-load">For {!! $property->type !!}</div>
                                                    <div class="housing-image-text">{!! $property->unit->building_unit !!}</div>
                                                </div>
                                                <div class="housing-content-container">
                                                    <div style="background-color:#a5f3fc; width: 180px;"><h5 class="text-housing-price">Rs @if($property->type == 'Rent') {!! $property->monthly_house_rent !!} @elseif($property->type == 'Sell') {!! $property->price !!} @endif</h5></div>
                                                    <a class="text-housing-price" href="{!! route('tenant.propertyDetail', $slug) !!}">@if($property->type == 'Rent') {!! $property->rent_name !!} @elseif($property->type == 'Sell') {!! $property->building->name !!} @endif</a>
                                                    <p class="housing-address"><img src="{{ asset('Images/Original/Icons/address.svg') }}" alt="address icon" class="ever-housing-icon">{!! $property->building->address !!}</p>
                                                </div>
                                                <div class="housing-content-areas">
                                                    <small class="housing-content-areas-paragraph text-center">
                                                        <img src="{{ asset('Images/Original/Icons/Sqft.svg') }}" alt="Icons" class="ever-housing-icon">
                                                        {!! $property->area !!} Sqft
                                                    </small>
                                                    @if($property->type == 'Rent')
                                                    <small class="housing-content-areas-paragraph text-center">
                                                        <img src="{{ asset('Images/Original/Icons/bed.svg') }}" alt="Icons" class="ever-housing-icon">
                                                        {!! $property->no_of_bed !!} Bed
                                                    </small>
                                                    <small class="housing-content-areas-paragraph text-center">
                                                        <img src="{{ asset('Images/Original/Icons/floor.svg') }}" alt="Icons" class="ever-housing-icon">
                                                        Floor No. {!! $property->floor !!}
                                                    </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> 
                                    @empty
                                        <div class="housing-grid-list-items text-center wow fadeInUp"data-wow-delay="0.1s" role="listitem">No House for Rent</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Route::currentRouteName() == 'tenant.dashboard')
        <div class="text-center">
            <a href="{!! route('tenant.property-list') !!}" class="btn btnPrimary">Show More Property</a>
        </div>
    @endif
</section>
<!-- End House Details -->