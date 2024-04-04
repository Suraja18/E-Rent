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
        <form action="{!! route('tenant.search.property') !!}" method="GET" class="row bs-g-2">
            @csrf
            <div class="search-box-left">
                <div class="row bs-g-2">
                    <div class="search-input-box">
                        <input type="search" name="keyword" class="form-control" placeholder="Search Keyword" required @if(isset($search->keyword)) value="{!! $search->keyword !!}" @endif>
                    </div>
                    <div class="search-input-box">
                        <select class="form-select" name="type">
                            <option value="" selected>Property Type</option>
                            @foreach ($property_types as $type)
                                <option value="{!! $type->id !!}">{!! $type->building_unit !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search-input-box">
                        <select class="form-select" name="location">
                            @if (isset($search->location))
                                <option value="{!! $search->location !!}" selected>{!! $search->location !!}</option>
                            @else
                                <option value="" selected>Location</option>
                            @endif
                            
                            @foreach ($property_location as $location)
                                <option value="{!! $location !!}">{!! $location !!}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="search-box-right">
                <button type="submit" class="btnPrimary navButton is-search">Search</button>
            </div>
        </form>
    </div>
</section>
<!-- End Search Property -->