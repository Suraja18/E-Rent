@php
    if(Route::currentRouteName() == 'tenant.dashboard'){
        $property_rents = App\Models\RentProperty::latest()
                        ->where('status', 'Yes')
                        ->whereNotIn('id', function ($query) {
                            $query->select('rent_id')
                                ->from('rented_properties')
                                ->where('status', '<>', 'Cancelled')->where('status', '<>', 'Checked Out');
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
                                ->where('status', '<>', 'Cancelled')->where('status', '<>', 'Checked Out');
                        })
                        ->get()
                        ->shuffle();
    }
    $uniqueUnits = App\Models\Unit::latest()->get();
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
                        @if(!(Route::currentRouteName() == 'tenant.dashboard'))
                        <div class="row align-end">
                            <div class="error-rows">
                                <ul class="nav-ul">
                                    <li style="margin-right:.5rem;" class="mbxj">
                                        <select name="unitFilter" id="unitFilter" class="btn-clicks-filter">
                                            <option value="">Select Unit</option>
                                            @foreach($uniqueUnits as $unitName)
                                            <option value="{{ $unitName->building_unit }}">{{ $unitName->building_unit }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </li>
                                    <li style="margin-right:.5rem;" class="mbxj">
                                        <select name="priceFilter" id="priceFilter" class="btn-clicks-filter">
                                            <option value="">Price</option>
                                            <option value="1">0-30,000</option>
                                            <option value="2">30,000-1,00,000</option>
                                            <option value="3">1,00,000-15,00,000</option>
                                            <option value="4">15,00,000-50,00,000</option>
                                            <option value="5">50,00,000 +</option>
                                        </select>                                                                            
                                    </li>
                                    <li style="margin-right:.5rem;">
                                        <select name="ratingFilter" id="ratingFilter" class="btn-clicks-filter">
                                            <option value="">Rating</option>
                                            <option value="1">1 Star & Above</option>
                                            <option value="2">2 Stars & Above</option>
                                            <option value="3">3 Stars & Above</option>
                                            <option value="4">4 Stars & Above</option>
                                            <option value="5">5 Stars</option>
                                        </select>
                                        
                                    </li>
                                </ul>
                            </div>
                            <div class="error-rows text-right">
                                <ul class="nav-ul">
                                    <li style="margin-right:.5rem;">
                                        <button class="btn-clicks active" data-filter="All">All</button>
                                    </li>
                                    <li style="margin-right:.5rem;">
                                        <button class="btn-clicks" data-filter="Sell">Sell</button>
                                    </li>
                                    <li style="margin-right:.5rem;">
                                        <button class="btn-clicks" data-filter="Rent">Rent</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="hero-content">
                            <div class="housing-list">
                                <div class="housing-grid" role="list">
                                    @forelse ($property_rents as $property)
                                        @php
                                                $ratings = App\Models\Rating::where('rented_id', $property->id)->latest()->get();
                                                $starRate = 0;
                                                foreach ($ratings as $rate) {
                                                    $starRate =  $starRate + $rate->rate;
                                                }
                                                if($starRate >0)
                                                {
                                                    $starRate = ($starRate / count($ratings));
                                                }
                                                $fullStars = floor($starRate);
                                                $fraction = $starRate - $fullStars;
                                                $halfStar = $fraction >= 0.5;
                                        @endphp
                                        <div class="housing-grid-list-items wow fadeInUp"data-wow-delay="0.1s" role="listitem" data-type="{!! $property->type !!}" data-unit="{!! $property->unit->building_unit !!}" data-rating="{!! $fullStars !!}" data-price="@if($property->type == 'Rent') {!! $property->monthly_house_rent !!} @elseif($property->type == 'Sell') {!! $property->price !!} @endif">
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
                                                    <div class="d-flex">
                                                        <p class="housing-address"><img src="{{ asset('Images/Original/Icons/address.svg') }}" alt="address icon" class="ever-housing-icon">{!! $property->building->address !!}</p>
                                                        <div class="star-rating" style="margin-top: 1.5rem;margin-left: .5rem;">
                                                            @for ($i = 0; $i < $fullStars; $i++)
                                                                <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg>
                                                            @endfor
                                                            @if ($halfStar)
                                                                <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg>
                                                            @endif
                                                        </div>
                                                    </div>
                                                   
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
@if(!(Route::currentRouteName() == 'tenant.dashboard'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll('.btn-clicks');
        const listings = document.querySelectorAll('.housing-grid-list-items');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                buttons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                listings.forEach(listing => {
                    if (filter === 'All' || listing.getAttribute('data-type') === filter) {
                        listing.style.display = 'block';
                    } else {
                        listing.style.display = 'none';
                    }
                });
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll('.btn-clicks');
        const listings = document.querySelectorAll('.housing-grid-list-items');
        const unitFilter = document.getElementById('unitFilter');
        const ratingFilter = document.getElementById('ratingFilter');
        const priceFilter = document.getElementById('priceFilter');

        function filterItems() {
            const selectedType = document.querySelector('.btn-clicks.active').getAttribute('data-filter');
            const selectedUnit = unitFilter.value;
            const selectedRating = ratingFilter.value;
            const selectedPrice = priceFilter.value;

            const [minPrice, maxPrice] = getPriceRange();

            listings.forEach(listing => {
                const typeMatch = (selectedType === 'All' || listing.getAttribute('data-type') === selectedType);
                const unitMatch = (!selectedUnit || listing.getAttribute('data-unit') === selectedUnit);
                const ratingMatch = (!selectedRating || parseInt(listing.getAttribute('data-rating')) >= parseInt(selectedRating));
                const price = parseInt(listing.getAttribute('data-price'));
                const priceMatch = (!selectedPrice || (price >= minPrice && price <= maxPrice));

                if (typeMatch && unitMatch && ratingMatch && priceMatch) {
                    listing.style.display = 'block';
                } else {
                    listing.style.display = 'none';
                }
            });
        }

        function getPriceRange() {
            switch (priceFilter.value) {
                case '1':
                    return [0, 30000];
                case '2':
                    return [30000, 100000];
                case '3':
                    return [100000, 1500000];
                case '4':
                    return [1500000, 5000000];
                case '5':
                    return [5000000, Infinity];
                default:
                    return [0, Infinity];
            }
        }

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                buttons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                filterItems();
            });
        });

        [unitFilter, ratingFilter, priceFilter].forEach(filter => {
            filter.addEventListener('change', filterItems);
        });
    });

</script>
@endif