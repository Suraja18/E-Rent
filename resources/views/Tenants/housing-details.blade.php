<x-users.main.app-layout>
    <x-slot name="head">
        - Accounts
    </x-slot>
    <x-tenants.navbar />
    @php
        $combinedImages = [];
        $rentProperty = App\Models\RentProperty::where('slug', $property->slug)->first();
        if ($rentProperty) {
            for ($i = 1; $i <= 4; $i++) {
                $imageField = 'image_' . $i;
                if ($rentProperty->$imageField) {
                    $combinedImages[] = $rentProperty->$imageField;
                }
            }
        }
        $buildingImages = App\Models\Building::where('slug', $property->building->slug)->first();
        if ($buildingImages) {
            for ($i = 1; $i <= 4; $i++) {
                $imageField = 'image_' . $i;
                if ($buildingImages->$imageField) {
                    $combinedImages[] = $buildingImages->$imageField;
                }
            }
        }
        $combinedImages = array_slice($combinedImages, 0, 4);
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
     {{-- Start Banner --}}
     <div class="p5">
        <div class="p-r">
            <div class="row">
                <div class="mb-1">
                    <ul class="product-detail-container">
                        <li class="prd-detail"><a href="{!! route('tenant.property-list') !!}" class="text-hover">Property</a></li>
                        <li class="prd-detail"><a href="#" class="text-hover">{!! $property->unit->building_unit !!}</a></li>
                        <li class="prd-detail"><a>@if($property->type == 'Rent'){!! $property->rent_name !!}@elseif($property->type == 'Sell'){!! $property->building->name !!}@endif</a></li>
                    </ul>
                </div>
                <div class="row admin bs-gy-4">
                    
                    <div class="error-rows">
                        <div class="row bs-g-2 bs-y-2 mb-1">
                            <div class="col-flex-100">
                                <div class="slider-containers">
                                    <div class="slider-wrappers" role="list">
                                        @foreach ($combinedImages as $index => $image)
                                            <div class="slider-slide slide-img" aria-label="{{ $loop->index }} / 4" role="listitem">
                                                <div class="slider-small-img" onclick="showLargeImage({{ $loop->index }})">
                                                    <img src="{!! asset($image) !!}" alt="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-flex-83">
                                <div class="slider-small-img large-img">
                                    <div class="slider-large-img-container">
                                        <div class="slider-large-img-wrapper" role="list" id="largeImgWrapper">
                                            @foreach ($combinedImages as $index => $image)
                                                <div class="slider-slide slide-prev" role="listitem">
                                                    <img id="largeImg{!! $loop->index !!}" src="{!! asset($image) !!}" alt="image-{!! $loop->index !!}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="error-rows"> 
                        <div>
                            <div class="add-img-container">
                                <div class="star-rating">
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <svg class="svg-inline-fa text-warning max" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg>
                                    @endfor
                                    @if ($halfStar)
                                        <svg class="svg-inline-fa text-warning max" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg>
                                    @endif
                                </div>
                                <p class="star-rate-text">{!! count($ratings) !!}+ People rated and reviewed </p>
                            </div>
                            <h3 class="mb-1">@if($property->type == 'Rent'){!! $property->rent_name !!}@elseif($property->type == 'Sell'){!! $property->building->name !!}@endif</h3>
                            <div class="add-img-container mb-1">
                                <span class="span-prt-con">Building:</span>
                                <span class="span-prt-wra">{!! $property->building->name !!} </span>
                            </div>
                            <div class="mb-1"><p class="star-rate-text"><strong>Property Type :</strong> {!! $property->unit->building_unit !!} </p></div>
                            <div class="mb-1"><p class="star-rate-text"><strong>Landord :</strong> {!! $property->landlord->first_name !!} {!! $property->landlord->last_name !!} </p></div>
                            <div class="add-img-container">
                                <h1>Rs @if($property->type == 'Rent'){!! $property->monthly_house_rent !!}@elseif($property->type == 'Sell'){!! $property->price !!}@endif</h1>
                            </div>
                            @if($property->type == 'Rent')
                            <h4 class="text-danger">Extra Charge:</h4>
                            <div class="mb-1 add-img-container charges">
                                <p class="star-rate-text"><strong class="span-prt-wra">Electric Charge :</strong> Rs {!! $property->electric_charge !!} </p>
                                <p class="star-rate-text"><strong class="span-prt-wra">Water Charge :</strong> Rs {!! $property->water_charge !!} </p>
                                <p class="star-rate-text"><strong class="span-prt-wra">Garbage Charge :</strong> Rs {!! $property->garbage_charge !!} </p>
                            </div>
                            @endif
                            <div class="mb-1"><p class="star-rate-text text-hover"><strong>Available</strong> </p></div>
                            <div class="mb-1 add-img-container">
                                <p class="star-rate-text"><strong>Area :</strong><span class="form-input-prd">{!! $property->area !!} sq.ft</span> </p>
                                @if($property->type == 'Rent')
                                    <p class="star-rate-text"><strong>Bed :</strong><span class="form-input-prd">{!! $property->no_of_bed !!}</span> </p>
                                    <p class="star-rate-text"><strong>Floor :</strong><span class="form-input-prd">{!! $property->floor !!}</span>  </p>
                                @endif
                            </div>
                        </div>
                        <div class="add-img-container carts">
                            <button class="m-button btn-wishlist">
                                <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z"></path></svg>
                                Add to Wishlist
                            </button>
                            @php
                                if($property->type == 'Rent'){
                                    $slug = $property->slug;
                                }elseif ($property->type == 'Sell') {
                                    $slug = $property->building->slug;
                                }
                            @endphp
                            <a href="{!! route('tenant.showDetail', $slug) !!}" class="m-button btn-carts">
                                <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-shopping" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"></path></svg>
                                @if($property->type == 'Rent') Rent @elseif($property->type == 'Sell') Buy @endif {!! $property->unit->building_unit !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-r">
            <div class="row">
                <div class="row">
                    <div class="error-rows">
                        <h3 class="mb-1" style="text-decoration: underline">Description</h3>
                        @if($property->type == 'Rent'){!! $property->description !!}@elseif($property->type == 'Sell'){!! $property->building->description !!}@endif
                    </div>
                    <div class="error-rows">
                        <h3 class="mb-1" style="text-decoration: underline">Ratings & Review</h3>
                        <div class="slider-small-img large-cont">
                            <div class="row bs-g-2 bs-y-2 ratestr">
                                <div class="colun-auto">
                                    <div class="add-img-container starts align-center">
                                        <h2 class="fonts-head">
                                            {{ number_format($starRate, 2) }}<span class="ft-bolde">/5</span>
                                        </h2>
                                        <div class="mr-1">
                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <svg class="svg-inline-fa text-warning max" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg>
                                            @endfor
                                            @if ($halfStar)
                                                <svg class="svg-inline-fa text-warning max" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg>
                                            @endif
                                        </div>
                                        <p class="star-rate-text max">{!! count($ratings) !!}+ People rated and reviewed </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="text-left">Your rating</h5>
                                <div class="rate-star mb-1" style="width: 160px; height: 32px; background-size: 32px; cursor:pointer;" data-rating="0" title="5/5">
                                    <div class="star-value" style="background-size: 32px; width: 0%"></div>
                                </div>
                                <input type="hidden" name="rating" id="ratingInput" value="0">
                                <input type="hidden" name="rented_id" id="rented_id" value="{!! $property->id !!}">
                                <div class="text-left mb-1" style="padding-left: 0">
                                    <h5 class="mb-1">Your review</h5>
                                    <textarea class="form-control table-datas" id="reviewTextarea" rows="5" placeholder="Write your review" required> </textarea>
                                </div>
                                <div class="text-center mb-1">
                                    <button class="m-button submit-blue" id="submitReview">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <div class="allStars">
                                @foreach ($ratings as $rating)
                                    @php
                                        $ratingStar = $rating->rate; 
                                        $fullStars = floor($ratingStar);
                                        $halfStar = fmod(floatval($ratingStar), 1.0) >= 0.5;
                                        $replies = App\Models\RateReply::where('rating_id',$rating->id)->latest()->get();
                                    @endphp
                                    <div class="p-r ratestr">
                                        <div class="d-flex mb-1 sidebar-content-wrapper">
                                            <div class="d-flex align-center" style="gap: 1rem">
                                                <img src="{!! asset($rating->user->image) !!}" alt="" class="rate-profile">
                                                <h5>{!! $rating->user->first_name !!} {!! $rating->user->last_name !!}</h5>
                                            </div>
                                            <div class="p-r">
                                                <div class="m-button for-rate-btn rateOthers" data-target="rateOptions{{$rating->id}}">
                                                    <svg class="svg-inline-fa fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg>
                                                </div>
                                                <div class="rateOptions" id="rateOptions{{$rating->id}}">
                                                    <div class="p-10p">
                                                        @if($rating->user->id == auth()->id())
                                                        <div class="btn-container-opt below">
                                                            <button class="upper-btn editButton" style="cursor: pointer;" data-id="{{ $rating->id }}">Edit</button>
                                                        </div>
                                                        @endif
                                                        <div class="btn-container-opt @if($rating->user->id == auth()->id()) below @endif">
                                                            <a href="http://127.0.0.1:8000/tenants/property/Golden%20Urban%20House%20Single%20Room%20For%20Rent/make/payment" style="cursor: pointer;" class="upper-btn">Reply</a>
                                                        </div>
                                                        @if($rating->user->id == auth()->id())
                                                        <div class="btn-container-opt">
                                                            <form action="{!! route('delete.review', $rating) !!}" method="POST" id="deleteTables10">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="button" value="Delete" class="lower-btn" onclick="return confirmDelete('deleteTables10')">
                                                            </form>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex sidebar-content-wrapper">
                                            <div class="star-ratings">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $fullStars)
                                                        <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg>
                                                    @elseif ($i == $fullStars + 1 && $halfStar)
                                                        <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg>
                                                    @endif
                                                @endfor
                                            </div>                                            
                                        </div>
                                        <p class="text-body-time">{!! $rating->created_at->diffForHumans() !!}</p>
                                        <p class="text-body-paragraph mb-1" id="displayReview{!! $rating->id !!}">{!! $rating->review !!}</p>
                                        @if($rating->user->id == auth()->id())
                                        <form class="container" style="display:none" action="{!! route('update.review', $rating) !!}" id="editForm{{ $rating->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-1">
                                                <input type="hidden" class="form-control" value="{{ $rating->rate }}" />
                                                <textarea class="form-control table-datas" style="height:auto;" name="review" required>{!! $rating->review !!}</textarea>
                                            </div>
                                            <div class="text-center mb-1">
                                                <button class="m-button submit-blue">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                        @endif
                                        <div class="d-flex">
                                            <svg class="svg-inline-fa rotate-180" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="reply" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M8.31 189.9l176-151.1c15.41-13.3 39.69-2.509 39.69 18.16v80.05C384.6 137.9 512 170.1 512 322.3c0 61.44-39.59 122.3-83.34 154.1c-13.66 9.938-33.09-2.531-28.06-18.62c45.34-145-21.5-183.5-176.6-185.8v87.92c0 20.7-24.31 31.45-39.69 18.16l-176-151.1C-2.753 216.6-2.784 199.4 8.31 189.9z"></path></svg>
                                            <div>
                                                <h5 style="margin-top: .6rem; text-align: left;">Respond from Suraj <span class="text-body-time">5 mins ago</span></h5>
                                                <p class="text-body-paragraph">Thank you for your valuable feedback</p>
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
     {{-- End Banner --}}
     <section class="container p5 no-pd">
        <div class="d-flex mb-1 align-center sidebar-content-wrapper">
            <div>
                <h3>Similar Property</h3>
                <h5 class="mb-0">Essential for a better life</h5>
            </div>
            <a href="{!! route('tenant.property-list') !!}" class="texst text-hover">
                View all
            </a>
        </div>
     </section>
     <x-tenants.property-detail :propertiee="$properties ?? null" />


     <script>
        var currentIndex = 0;
        var slideWidth = 100;

        function showLargeImage(index) {
            currentIndex = index;
            var largeImgWrapper = document.getElementById('largeImgWrapper');
            largeImgWrapper.style.transform = 'translateX(' + (-slideWidth * index) + '%)';
        }

        function slideLeft() {
            currentIndex = (currentIndex === 0) ? 0 : currentIndex - 1;
            showLargeImage(currentIndex);
        }

        function slideRight() {
            var numSlides = document.querySelectorAll('.slider-large-img-wrapper .slider-slide').length;
            currentIndex = (currentIndex === numSlides - 1) ? currentIndex : currentIndex + 1;
            showLargeImage(currentIndex);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var rateStar = document.querySelector('.rate-star');
            var starValue = document.querySelector('.star-value');
            var ratingInput = document.getElementById('ratingInput');

            function setRating(widthPercent) {
                starValue.style.width = `${widthPercent}%`;
                var rating = (widthPercent / 20).toFixed(1); // Calculate the rating based on width percentage
                ratingInput.value = rating; // Update the hidden input value
            }

            rateStar.addEventListener('mousemove', function(e) {
                var boundingClientRect = rateStar.getBoundingClientRect();
                var widthPercent = ((e.clientX - boundingClientRect.left) / boundingClientRect.width) * 100;
                setRating(Math.round(widthPercent / 10) * 10); // Snap to nearest half-star
            });

            rateStar.addEventListener('click', function(e) {
                var boundingClientRect = rateStar.getBoundingClientRect();
                var widthPercent = ((e.clientX - boundingClientRect.left) / boundingClientRect.width) * 100;
                setRating(Math.round(widthPercent / 10) * 10);
            });

            rateStar.addEventListener('mouseleave', function() {
                var currentRating = parseFloat(ratingInput.value) * 20;
                setRating(currentRating);
            });
        });
        $(document).ready(function() {
            $('#submitReview').click(function(e) {
                e.preventDefault();
                var rating = $('#ratingInput').val();
                var review = $('#reviewTextarea').val();
                var rentedId = $('#rented_id').val();
                $.ajax({
                    url: '{{ route("submit.rating") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        rating: rating,
                        review: review,
                        rented_id: rentedId
                    },
                    success: function(response) {
                        $('#reviewTextarea').val('');
                        var stars = '';
                        var rating = parseFloat(response.rating);
                        var fullStars = Math.floor(rating);
                        var halfStar = (rating % 1) !== 0;

                        for (var i = 1; i <= 5; i++) {
                            if (i <= fullStars) {
                                stars += `<svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg>`;
                            } else if (i === fullStars + 1 && halfStar) {
                                stars += `<svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg>`;
                            }
                        }

                        $('.allStars').prepend(`
                            <div class="p-r ratestr">
                                <div class="d-flex mb-1 sidebar-content-wrapper">
                                    <div class="d-flex align-center" style="gap: 1rem">
                                        <img src="${response.userImage}" alt="" class="rate-profile">
                                        <h5>${response.userName}</h5>
                                    </div>
                                </div>
                                <div class="d-flex sidebar-content-wrapper">
                                    <h5 class="star-ratings">${stars}</h5>
                                </div>
                                <p class="text-body-time">Just now</p>
                                <p class="text-body-paragraph mb-1">${response.review}</p>
                            </div>
                        `);
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            title: 'Error!',
                            text: xhr.responseText || 'There was a problem with your request!',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const rateButtons = document.querySelectorAll('.rateOthers');

            rateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = button.getAttribute('data-target');
                    const targetElement = document.getElementById(targetId);
                    targetElement.classList.toggle('active');
                });
            });
            document.querySelectorAll('.editButton').forEach(button => {
                button.addEventListener('click', function() {
                    const ratingId = this.getAttribute('data-id');
                    const form = document.getElementById('editForm' + ratingId);
                    const targetElement = document.getElementById('rateOptions' + ratingId);
                    targetElement.classList.remove('active');
                    form.style.display = form.style.display === 'none' ? 'block' : 'none';
                });
            });
        });
        
    </script>
    <x-tenants.footer />
</x-users.main.app-layout>
    