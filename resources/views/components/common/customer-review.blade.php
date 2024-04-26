     <!-- Customer Review Banner -->
     <section class="clientSays bg-blue-lighter pt-7b">
         <div class="property-wrappers">
             <div class="container is-header">
                 <div class="hero-content housing-content-center">
                     <div class="hero-content housing-content-center housing-detail">
                         <img src="../Images/Original/Icons/handshake.svg" alt="Logo" loading="lazy">
                         <h1 class="banner-header">Our customers’ stories of success</h1>
                         <p class="text-testimonial text-center">See how our customers are experiencing success and review in our website.</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- End Customer Review Banner -->
     @php
     if(Route::currentRouteName() == 'user.index'){
        $rates = App\Models\webReview::take(3)->get();
     }else {
        $rates = App\Models\webReview::all();
     }  
     @endphp
     <!-- Start Client Says -->
     <section class="clientSays bg-light">
         <div class="container pt-7b">
             <div class="hero-content mt-5r">
                 <h3 class="text-center color-navy">
                     What our customers have to say
                 </h3>
                 <div>
                     <div class="testimonial-three-grid" role="list">
                        @foreach ($rates as $rate)
                        @php
                            $ratingStar = $rate->rate; 
                            $fullStars = floor($ratingStar);
                            $halfStar = fmod(floatval($ratingStar), 1.0) >= 0.5;
                        @endphp
                        <div role="listitem" class="card-testimonial gap-2m p2-5">
                            <div class="testimonial-profiles">
                                @if (!$rate->user->image)
                                    <div class="testimonial-imag-profile profile-avatar-no-img">
                                        {!! substr($rate->user->first_name, 0, 1) !!}
                                    </div>
                                @endif
                                @if ($rate->user->image)
                                    <img src="{!! asset($rate->user->image) !!}" class="testimonial-imag-profile" alt="{!! $rate->user->first_name !!}">
                                @endif
                            </div>
                            <p class="font-italic">“{!! $rate->review !!}”</p>
                            <div class="hero-content pb-1">
                                <div class="star-ratings">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $fullStars)
                                            <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg>
                                        @elseif ($i == $fullStars + 1 && $halfStar)
                                            <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg>
                                        @endif
                                    @endfor
                                </div>
                                <div class="text-highlight is-bold">
                                    {!! $rate->user->first_name !!} {!! $rate->user->last_name !!}
                                </div>
                                @php
                                    $pos = "";
                                    if ($rate->user->roles == 1) {
                                        $pos = "Tenant";
                                    } elseif ($rate->user->roles == 2) {
                                        $pos = "Landlord";
                                    }
                                @endphp
                                <div class="text-highlight">{{  $pos  }}</div>
                            </div>
                        </div>
                        @endforeach
                         
                     </div>
                 </div>
                 @if(Route::currentRouteName() == 'user.index')
                    <div class="text-center">
                        <a href="{!! route('user.customer-review') !!}" class="btn btnPrimary">Show More</a>
                    </div>
                @endif
             </div>
         </div>
     </section>
     <!-- End Client Says -->
     <x-users.showing-ads />
