<x-users.main.app-layout>
    <x-slot name="head">
        - User Roles
    </x-slot>
    <x-users.navbar />

    <!-- Start BreadCrumb -->
    <section class="breadcrumb-container">
        <div class="breadcrumb-wrapper">
            <a href="{!! route('user.user-role') !!}" class="breadcrumb-item inline-block">
                <div class="breadcrumb-head">Roles</div>
            </a>
            <img src="{!! asset('Images/Original/Icons/right-arrow.svg') !!}" alt="right-arrow" class="right-arrows">
            <div class="breadcrumb-item active">
                <div class="breadcrumb-head active">{!! $role->user_roles !!}</div>
            </div>
        </div>
    </section>
    <!-- End BreadCrumb -->

    <!-- Start Roles Details -->
    <section class="container-large pt-7b no-pt">
        <div class="hero-banner reverse">
            <div class="col-50 hero-left">
                <div class="hero-container pr-5t">
                    <div class="hero-content mb-3 pt-7b no-pb">
                        <h1>{!! $role->roles !!}</h1>
                        <h2 class="heading-med is--text-orange70">{!! $role->user_roles !!}</h2>
                        <p>{!! $role->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-50">
                <div class="roles-user-banners wow bounceInDown">
                    <img src="{!! asset($role->image) !!}" sizes="(max-width: 479px) 90vw, (max-width: 767px) 92vw, (max-width: 991px) 90vw, (max-width: 1279px) 45vw, (max-width: 1919px) 44vw, 848px" alt="{!! $role->user_roles !!}" loading="eager" class="role-banner-image">
                </div>
            </div>
        </div>
    </section>
    <!-- End Roles Details -->

    <section class="c-wrappers pt-7b">
        <div class="hero-content gap-2m">
            <div class="text-navys text-center">Processes that pay off</div>
            <p class="text-higher text-center">{!! $role->processes_that_pay_off !!}</p>
        </div>
    </section>


    <section class="container pt-10b no-pb">
        <div class="hero-banner reverse">
            <div class="col-70">
                <div class="hero-content mb-3">
                    <div class="text-navys">Made for property people</div>
                    <h2 class="heading-med">Tools for Seamless Helps</h2>
                    <div class="role-property-grids">
                        @php
                            $descriptions = App\Models\RolesDescription::where('role_id', $role->id)->latest()->get();
                        @endphp
                        @forelse ($descriptions as $desc)
                        <div class="mt1-5" role="listitem">
                            <h4 class="heading-xS">{!! $desc->title !!}</h4>
                            <p>{!! $desc->description !!}</p>
                        </div>
                        @empty
                        <div class="mt1-5" role="listitem">
                            <h4 class="heading-xS">Coming Soon!</h4>
                        </div>
                        @endforelse
                        
                    </div>
                </div>
            </div>
            <div class="col-50 is-justify pl-7 pb3-5">
                <img src="{!! asset($role->sub_image) !!}" alt="Image" loading="lazy" class="role-property-img">
            </div>
        </div>
    </section>

    <x-users.showing-ads />
\
    <x-users.footer />

</x-users.main.app-layout>