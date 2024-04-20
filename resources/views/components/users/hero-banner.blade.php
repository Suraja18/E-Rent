@php
        $banner = App\Models\Banner::first();
@endphp
<!-- Hero Banner -->
<section id="headBanner">
    <div class="hero-cont">
            <div class="row align-center">
                    <div class="error-rows pr-3r">
                            <h2 class="display-xl-head">{!! $banner->user_head !!}</h2>
                            <p class="display-head-p">{!! $banner->user_desc !!}
                                <div class="text-center">
                                        <a href="{{ route('user.register') }}" class="btn btnPrimary">Join us</a>
                                </div>
                            </p>
                    </div>
                    <div class="error-rows im-mt lightblueColor">
                            <img src="{!! asset($banner->image_1) !!}" class="img-fluid" alt="">
                    </div>
            </div>
    </div>
</section>
<!-- End Hero Banner -->