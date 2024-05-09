<!-- Start Overview Client Says  --> 
@if(isset($press))
<section class="clientSays pt-7b">
    <div class="client-header">
        <div class="hero-content">
            <div class="h3-client-heading">
                <h3 class="mediumText inline-block">{!! $press->heading !!}</h3>
                @if(Route::currentRouteName() == 'user.index')
                    <a href="{!! route('user.press-media') !!}" class="client-header-link w-clearfix">
                        <div class="client-btn_text"
                            style="color: rgb(40, 36, 102);">View All
                            Stories<div class="client-btn_icon"><div
                                    class="icon_svg-code w-embed"
                                    style="color: rgb(40, 36, 102);"><svg
                                        width="16" height="16"
                                        viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 8H14"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"></path>
                                        <path
                                            d="M9.75732 3.75732L14 7.99996L9.75732 12.2426"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg></div></div>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="container p3">
        <div data-duration-in="300" data-duration-out="200"
            data-current="Testimonial 4" data-easing="ease"
            class="clients-tab">
            <div class="clients-tab-content">
                <div data-w-tab="Testimonial 4"
                    class="c-testimonial c-active">
                    <div class="testimonial-container">
                        <div class="testimonials" role="list">
                            <div class="testimonial-items"
                                role="listitem">
                                <div class="col-50 testimonialCol p2-5">
                                    <div class="hero-content pb-4"
                                        id="heroTestimonialContent">
                                        <div class="quote">
                                            <img loading="lazy"
                                                src="{!! asset('Images/Original/quotes.svg') !!}"
                                                alt="quotes"
                                                class="image-quotes">
                                            <div
                                                class="testimonial-wrappers for-mobile">
                                                <img
                                                    alt="{!! $press->slug !!}"
                                                    loading="lazy"
                                                    src="{!! asset($press->image_1) !!}"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <p
                                            class="mediumText mt-4a client-says">{!! $press->description !!}</p>
                                        <div
                                            class="hero-content mt-4a is-quote">
                                            <div
                                                class="hero-content text-left">
                                                <div class="text-testimonial">{{ $press->created_at->format('j M Y') }}, {{ $press->created_at->format('h:i A') }}</div>
                                                <div class="text-testimonial is-bold">E-Rent</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-50 testimonialCol clientImage">
                                    <img loading="lazy"
                                        src="{!! asset($press->image_1) !!}"
                                        alt
                                        sizes="(max-width: 479px) 100vw, (max-width: 767px) 92vw, (max-width: 991px) 90vw, (max-width: 1279px) 43vw, (max-width: 1919px) 44vw, 646.5px"
                                        class="testimonialFullImage">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End Overview Client Says -->