@php
    $property_types = App\Models\Unit::latest()->get();
    $buildings = App\Models\Building::latest()->get()->shuffle();
    $property_location = [];
    $first_words = [];
    foreach ($buildings as $building) {
        $first_word = strtok($building->address, ' ');
        $first_word = str_replace(',', '', $first_word);
        if (!isset($first_words[$first_word])) { 
            $property_location[] = $first_word;
            $first_words[$first_word] = true;
        }
    }
@endphp


<!-- Search Property -->
<section class="searchProperty">
    <div class="container search-banner search-container"
        data-wow-delay="0.1s">
        <div class="row bs-g-2">
            <div class="search-box-left">
                <div class="row bs-g-2">
                    <div class="search-input-box">
                        <input type="text" class="form-control" placeholder="Search Keyword">
                    </div>
                    <div class="search-input-box">
                        <select class="form-select">
                            <option value="" selected>Property Type</option>
                            @foreach ($property_types as $type)
                                <option value="{!! $type->id !!}">{!! $type->building_unit !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search-input-box">
                        <select class="form-select">
                            <option value="" selected>Location</option>
                            @foreach ($property_location as $location)
                                <option value="{!! $location !!}">{!! $location !!}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="search-box-right">
                <a href="/Errors/404Error.html"
                    class="btnPrimary navButton is-search">Search</a>
            </div>
        </div>
    </div>
</section>
<!-- End Search Property -->