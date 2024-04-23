@php
    $advertising = App\Models\Advertising::first();
@endphp
<!-- Advertising if any Video i made -->
<section class="advertising"> 
    <div class="container ad-container pt-7b">
        <div class="banner pt-2">
            <div class="hero-banner for-mobiles">
                <div class="col-50 hero-left hero w-40">
                    <div class="hero-container pr-5t">
                        <div class="hero-content hero">
                            <div class="hero-header">
                                <h1 class="hero-header-text">{!! $advertising->video_title !!}</h1>
                            </div>
                            <p class="paragraph">{!! $advertising->video_description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-50 hero-right hero w-60">
                    <div class="hero-image-container lightblueColor">
                        <div class="hero-banner-image">
                            <div class="image-container">
                                <iframe width="100%" height="480px"
                                    src="{!! $advertising->video_link !!}"
                                    frameborder="0" allowfullscreen
                                    allow="autoplay; encrypted-media"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Advertising -->
