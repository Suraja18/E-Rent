@php
    $about1 = App\Models\About::first();
    $about1images = App\Models\DescImage::where('about_id', $about1->id)->get();
    $imageIndex = 1;
    $about2 = App\Models\About::find(2);
    $about2images = App\Models\DescImage::where( 'about_id' , 2 )->get();
    $about2imagesShuffled = $about2images->shuffle();
    $totalImages = $about2imagesShuffled->count();
    $midpoint = ceil($totalImages / 2);
    $landlordCount = App\Models\User::where('roles', 2)->count();
    $tenantCount = App\Models\User::where('roles', 1)->count();
    $rents = App\models\RentPayment::where('payment_type', 'Rent')->where('status', 'paid')->get();
    $rentTotal = 0;
    foreach( $rents as $rent )
    {
        $rentTotal = $rentTotal + $rent->amt_paid;
    }
    function formatRentTotal($rentTotal) {
        if ($rentTotal < 1000) {
            return $rentTotal;
        } elseif ($rentTotal < 1000000) {
            return round($rentTotal / 1000) . 'k';
        } elseif ($rentTotal < 1000000000) {
            return round($rentTotal / 1000000) . ' million';
        } else {
            return round($rentTotal / 1000000000) . ' billion';
        }
    }
    $formattedRentTotal = formatRentTotal($rentTotal);
    $about3 = App\Models\About::find(3);
    $about3images = App\Models\DescImage::where( 'about_id' , 3 )->first();
    $rates = App\Models\webReview::all();
    $ratesCount = $rates->count();
    $totalrate = 0;
    foreach ($rates as  $rate) {
        $totalrate = $totalrate + $rate->rate;
    }
    if($ratesCount > 0)
    {
        $avggRate = $totalrate / $ratesCount;
    }else {
        $avggRate = 0;
    }
    $users = App\Models\userRoles::latest()->get();
@endphp
    <!-- About-Hero Banner -->
    <section class="about-banners">
        <div class="container-large">
            <div class="static-wrapper column-reverse">
                <div class="col-50 hero-left">
                    <div class="hero-container">
                        <div class="hero-content mb-3 ptb-4">
                            <div class="web-logo-for-aboutus">
                                <div class="web-logo-border"></div>
                                <img src="{!! asset('Images/Original/House-Logo.png') !!}" loading="eager" alt="E-Rent"
                                    class="house-logo-about">
                            </div>
                            <h1 class="text-size-3 mb-3 text-hover">
                                {!! $about1->heading !!}
                            </h1>
                            <p class="mediumText">{!! $about1->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-50 align-center pl-2">
                    <div class="about-image-container">
                        @foreach ($about1images as $image)
                            <div class="about-image-container-post image{!! $imageIndex !!}">
                                <div class="about-image-container-circle image{!! $imageIndex !!}">
                                    <img src="{!! asset($image->image) !!}"
                                        loading="eager"
                                        sizes="(max-width: 991px) 18vw, (max-width: 1919px) 9vw, 167.59375px" alt="Image 1"
                                        class="about-images">
                                </div>
                            </div>
                        @php
                            $imageIndex++;
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About-Hero Banner -->
    <!-- Start About Us Section -->
    <section class="about-company">
        <div class="container pt-10b">
            <div class="static-wrapper">
                <div class="col-50 align-top pr-5t pb-3">
                    <div class="width-500">
                        <div class="infinity-container">
                            <div class="infinity-row w-embed">
                                <video autoplay loop style="width:100%;" muted playsinline data-wf-ignore="true"
                                    __idm_id__="253953">
                                    <source src="{!! asset('Images/Original/infinity.mov') !!}"
                                        type="video/mp4; codecs=&quot;hvc1&quot;">
                                    <source src="{!! asset('Images/Original/Infinity_2.webm') !!}" type="video/webm"
                                        data-wf-ignore="true">
                                </video>
                            </div>
                            <div class="infinity-left-image">
                                @foreach ($about2imagesShuffled->take($midpoint) as $image)
                                <img src="{{ asset($image->image) }}"
                                    loading="lazy"
                                    class="infinity-photo-content left-slide-images"
                                    alt="left-image">
                                @endforeach
                            </div>
                            <div class="infinity-right-image">
                                @foreach ($about2imagesShuffled->slice($midpoint) as $image)
                                <img src="{{ asset($image->image) }}"
                                    loading="lazy"
                                    class="infinity-photo-content right-slide-images"
                                    alt="left-image">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-50">
                    <div class="hero-content gap-2m">
                        <h3 class="heading-larger text-hover">{!! $about2->heading !!}</h3>
                        <p class="paragraph">{!! $about2->description !!}</p>
                        @if(auth()->id())
                        <a href="{!! route('tenant.view.allProperty') !!}" class="btnPrimary inline-block">
                            <div class="text-btn">See Properties</div>
                        </a>
                        @else
                        <a href="{!! route('user.register') !!}" class="btnPrimary inline-block">
                            <div class="text-btn">Join Us</div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="houseDetails">
        <div class="container p5">
            <div class="service-grid" role="list">
                <div class="service-grid" role="listitem">
                    <div class="housing-container">
                        <div class="housing-wrapper">
                            <div class="hero-content housing-content-center housing-detail plr-4 for-about">
                                <h2 class="text-center text-hover">We like
                                    numbers. They show us where we’re
                                    heading...</h2>
                                <div class="hero-content text-left">
                                    <p class="paragraph text-center">The
                                        Happy platform enables property
                                        managers, owners, and lenders to
                                        take better care of millions of
                                        apartments. Our tools capture all
                                        the photos, details, and rich data
                                        our customers need to manage and
                                        maintain their properties
                                        better.</p>
                                </div>
                            </div>

                            <div class="elementor-inner-section">
                                <div class="ads-container">
                                    <div class="ads--row">
                                        <div class="elementor-inner-contents about-grid">
                                            <div class="about-grid-container">
                                                <div class="tenantsLandlord-widget-ads">
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <img src="{!! asset('Images/Original/Owners.png') !!}" loading="lazy"
                                                                sizes="(max-width: 350px) 100vw, 350px"
                                                                alt="OwnersIcon">
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-header">
                                                                {!! $landlordCount !!}+
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-subheader">
                                                                Landlords
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-inner-contents about-grid">
                                            <div class="about-grid-container">
                                                <div class="tenantsLandlord-widget-ads">
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <img src="{!! asset('Images/Original/guest-bag.png') !!}" loading="lazy"
                                                                sizes="(max-width: 350px) 100vw, 350px"
                                                                alt="OwnersIcon">
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-header">
                                                                {!! $tenantCount !!} +
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-subheader">
                                                                Tenants
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-inner-contents about-grid">
                                            <div class="about-grid-container">
                                                <div class="tenantsLandlord-widget-ads">
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <img src="{!! asset('Images/Original/Rate-increase.png') !!}"
                                                                loading="lazy" sizes="(max-width: 350px) 100vw, 350px"
                                                                alt="OwnersIcon">
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-header">
                                                                Rs {!! $formattedRentTotal !!}
                                                                +
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-subheader">
                                                                Rental
                                                                income
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-inner-contents about-grid">
                                            <div class="about-grid-container">
                                                <div class="tenantsLandlord-widget-ads">
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <img src="{!! asset('Images/Original/Review-like.png') !!}"
                                                                loading="lazy" sizes="(max-width: 350px) 100vw, 350px"
                                                                alt="OwnersIcon">
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image mb-2p">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-header">
                                                                {!! $avggRate !!} Stars
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-icons-image">
                                                        <div class="about-grid-wrapper">
                                                            <h4 class="about-grid-subheader">
                                                                Average
                                                                User review
                                                            </h4>
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
        </div>
    </section>

    <section class="about-history">
        <div class="container pt-7b">
            <div class="static-wrapper">
                <div class="col-30 pb-3">
                    <img src="{!! asset($about3images->image) !!}"
                        loading="lazy" alt="Company Image" class="about-company-history">
                </div>
                <div class="col-70 pl-7">
                    <div class="hero-content gap-2m">
                        <h3 class="heading-larger text-hover">{!! $about3->heading !!}</h3>
                        <div style="height: 10.5rem;" class="expand-history">
                            <p class="expand-history-full">{!! $about3->description !!}</p>
                            <div class="expands-action" id="all-history" style="opacity: 1;">
                                <div class="read-more" id="readMore">
                                    <div class="arrow-icon w-embed" style="color: rgb(40, 36, 102);"
                                        id="downArrowIcon">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="Icon">
                                                <path id="Rectangle 5211"
                                                    d="M12.8716 6.25546L8.62894 10.4981L4.3863 6.25546"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="read-more-btn" onclick="toggleExpand()">Read
                                        More</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="user-details-full-container pt-7b">
        <div class="client-header">
            <div class="hero-content overflow-visible text-center">
                <h3 class="heading-larger text-hover">Meet the people behind
                    the website</h3>
                <p class="paragraph text-center">
                    Meet the dedicated team behind E-Rent, the innovative platform transforming the way properties are rented online. At the core of E-Rent is a group of dynamic professionals, each bringing a unique set of skills and a shared passion for simplifying the rental process.</p>
            </div>
        </div>
        <div class="user-details-wrapper">
            <div class="wrapper-sliders">
                <div class="inline-block">
                    <div class="whole-sliders" id="wholeSliders" role="list">
                        <div class="sliders-wrapper draggable">
                            <div class="sliders-grid" id="sliderGrid">
                                @foreach ($users as $user)
                                <div class="sliders-card current-slide active" role="listitem" data-silder-is="{!! $loop->iteration !!}"
                                    aria-hidden="true" tabindex="{!! $loop->iteration !!}">
                                    <div class="slider-card-inner">
                                        <div class="slider-container">
                                            <div class="slider-marker">
                                                <div class="slider-icons">
                                                    <img src="{!! asset($user->image) !!}" alt="Icons"
                                                        loading="lazy" class="slide-icon-img">
                                                </div>
                                            </div>
                                            <h4>{!! $user->user_roles !!}</h4>
                                            <p>{!! $user->description !!}</p>
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
    </section>

    <x-users.showing-ads />
    <!-- End About Us Section -->
