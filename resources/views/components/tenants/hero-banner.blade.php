@php
        $banner = App\Models\Banner::first();
        $images = [
                $banner->image_1,
                $banner->image_2,
                $banner->image_3,
                $banner->image_4
        ];
        $images = array_filter($images, function ($image) {
            return !empty($image);
        });
        shuffle($images);
@endphp
<!-- Hero Banner -->
<section class="heroBanner">
    <div class="container">
        <div class="banner pt-2">
            <div class="hero-banner">
                <div class="col-50 hero-left hero">
                    <div class="hero-container pr-5t">
                        <div class="hero-content hero gap-2m">
                            <img src="{!! asset('Images/Original/Logo-House.png') !!}"
                                loading="lazy" alt="Logo"
                                class="logo-size1">
                            <div class="hero-header">
                                <h1 class="hero-header-text">Rental
                                    Property</h1>
                                <div style="background-color:#a5f3fc"
                                    class="heading-text-hero h1-text"></div>
                            </div>
                            <h2 class="hero-subHeader-text">{!! $banner->tenant_head !!}</h2>
                            <p
                                class="paragraph for-mobiles">"{!! $banner->tenant_desc !!}"</p>
                            <div class="hero-button mb-1">
                                <a href="#allPropertyDetail"
                                    class="btnPrimary navButton">Explore Property</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-50 hero-right hero">
                    <div class="hero-image-container lightblueColor">
                        <div class="hero-banner-image">
                            <div class="image-container">
                                <div class="slideshow-container">
                                    @foreach ($images as $image)
                                        <div class="heroBannerSlides">
                                            <img src="{!! asset($image) !!}" alt="Rental Property">
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
<!-- End Hero Banner -->