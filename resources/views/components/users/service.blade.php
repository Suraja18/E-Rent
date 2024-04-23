@php
    if(Route::currentRouteName() == 'user.index')
    {
        $services = App\Models\Service::latest()->take(3)->get();
    }else {
        $services = App\Models\Service::latest()->get();
    }
    
@endphp
<!-- Services -->
<section class="services">
    <div class="container pt-7b"> 
        <h2 class="text-center">E-Rent offers you can see</h2>
        <div class="mt-4a">
            <div class="services-wrapper">
                <div class="service-grid" role="list">
                    @foreach ($services as $service)
                    <div class="service-grid" role="listitem">
                        <div class="list-item-background pd2">
                            <div class="hero-content service-block">
                                <div
                                    class="hero-content text-left pb-1">
                                    <div class="text-center">
                                        <img
                                            src="{!! asset($service->image) !!}"
                                            class="service-icons"
                                            alt="Service Icon"
                                            loading="lazy">
                                    </div>
                                    <div
                                        class="mediumText serviceFont">{!! $service->heading !!}</div>
                                    <div class="text-service-paragraph">"{!! $service->description !!}"</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        @if(Route::currentRouteName() == 'user.index')
            <div class="text-center">
                <a href="{!! route('user.services') !!}" class="btn btnPrimary">Show More</a>
            </div>
        @endif
    </div>
</section>
<!-- End Services -->