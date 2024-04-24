@php
    $role = App\Models\userRoles::find(3);
@endphp
<section class="container-large pt-7b no-pt">
    @if ($indexPage)
        {{ $indexPage }}
    @endif
    <div class="hero-banner reverse">
            <div class="col-50 hero-left">
                    <div class="hero-container pr-5t">
                            <div class="hero-content mb-3 pt-7b no-pb">
                            <h2 class="heading-med is--text-orange70">{!! $role->user_roles !!}</h2>
                            <p>@if(strlen($role->description) > 600)
                                    {!! substr($role->description, 0, 600) !!}...
                                @else
                                    {!! $role->description !!}
                                @endif
                            </p>
                            </div>
                    </div>
                    </div>
                    <div class="col-50">
                    <div class="roles-user-banners wow bounceInDown">
                            <img src="{!! asset($role->image) !!}" sizes="(max-width: 479px) 90vw, (max-width: 767px) 92vw, (max-width: 991px) 90vw, (max-width: 1279px) 45vw, (max-width: 1919px) 44vw, 848px" alt="ROles Image" loading="eager" class="role-banner-image">
                    </div>
            </div>
    </div>
    @if ($indexPageBtn)
        {{ $indexPageBtn }}
    @endif
</section>