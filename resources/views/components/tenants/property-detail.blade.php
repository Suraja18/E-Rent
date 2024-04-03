 @php
    if(Route::currentRouteName() == 'tenant.dashboard'){
        $property_rents = App\Models\RentProperty::latest()->take(4)->get()->shuffle();
        $property_sells = App\Models\HomeSell::latest()->take(4)->get()->shuffle();
    }else{
        $property_rents = App\Models\RentProperty::latest()->get()->shuffle();
        $property_sells = App\Models\HomeSell::latest()->get()->shuffle();
    }
 @endphp
 
 <!-- Start House Details -->
 <section class="houseDetails" id="allPropertyDetail">
    <div class="container p5">
        <div class="service-grid" role="list">
            <div class="service-grid" role="listitem">
                <div class="housing-container">
                    <div class="housing-wrapper">
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
                        <div class="hero-content">
                            <div class="housing-list">
                                <div class="housing-grid" role="list">
                                    @forelse ($property_rents as $property)
                                        <div class="housing-grid-list-items wow fadeInUp"data-wow-delay="0.1s" role="listitem">
                                            <div class="housing-grid-list-container">
                                                <div class="housing-image-container">
                                                    <a href="#"><img class="img-fluid" src="{!! asset($property->image_1) !!}" alt></a>
                                                    <div class="btnPrimary navButton image-top-load">For Rent</div>
                                                    <div class="housing-image-text">{!! $property->unit->building_unit !!}</div>
                                                </div>
                                                <div class="housing-content-container">
                                                    <div style="background-color:#a5f3fc; width: 150px;"><h5 class="text-housing-price">Rs {!! $property->monthly_house_rent !!}</h5></div>
                                                    <a class="text-housing-price" href="#">{!! $property->rent_name !!}</a>
                                                    <p class="housing-address"><img src="../Images/Original/Icons/address.svg" alt="address icon" class="ever-housing-icon">{!! $property->building->address !!}</p>
                                                </div>
                                                <div class="housing-content-areas">
                                                    <small class="housing-content-areas-paragraph text-center">
                                                        <img src="../Images/Original/Icons/Sqft.svg" alt="Icons" class="ever-housing-icon">
                                                        {!! $property->area !!} Sqft
                                                    </small>
                                                    <small class="housing-content-areas-paragraph text-center">
                                                        <img src="../Images/Original/Icons/bed.svg" alt="Icons" class="ever-housing-icon">
                                                        {!! $property->no_of_bed !!} Bed
                                                    </small>
                                                    <small class="housing-content-areas-paragraph text-center">
                                                        <img src="../Images/Original/Icons/floor.svg" alt="Icons" class="ever-housing-icon">
                                                        Floor No. {!! $property->floor !!}
                                                    </small>
                                                </div>
                                            </div>
                                        </div> 
                                    @empty
                                        <div class="housing-grid-list-items text-center wow fadeInUp"data-wow-delay="0.1s" role="listitem">No House for Rent</div>
                                    @endforelse
                                    @foreach ($property_sells as $property)
                                    <div class="housing-grid-list-items wow fadeInUp"data-wow-delay="0.1s" role="listitem">
                                        <div class="housing-grid-list-container">
                                            <div class="housing-image-container">
                                                <a href="#"><img class="img-fluid" src="{!! asset($property->getBuilding->image_1) !!}" alt></a>
                                                <div class="btnPrimary navButton image-top-load">For Sell</div>
                                            </div>
                                            <div class="housing-content-container">
                                                <div style="background-color:#a5f3fc; width: 150px;"><h5 class="text-housing-price">Rs {!! $property->price !!}</h5></div>
                                                <a class="text-housing-price" href="#">{!! $property->getBuilding->name !!}</a>
                                                <p class="housing-address"><img src="../Images/Original/Icons/address.svg" alt="address icon" class="ever-housing-icon">{!! $property->getBuilding->address !!}</p>
                                            </div>
                                        </div>
                                    </div> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End House Details -->