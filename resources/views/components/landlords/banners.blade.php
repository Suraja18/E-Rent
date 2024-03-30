<div class="is-tenant-banners">
    <div class="is-header-all-container">
        <div class="hide">
            <ul class="banner-header-links">
                <li class="banner-header-name">
                    <a href="{{ route('landlord.dashboard') }}" class="banner-link-for-header">Dashboard</a>
                </li>
                @if(isset($withhead))
                    {!! $withhead !!}
                @endif
                @if(Route::currentRouteName() != 'landlord.dashboard')
                    <li class="banner-header-name">
                        /<span class="banner-link-for-header for-normal">@if($name){!! $name !!}@endif</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="is-header-all-wrappers">
        <div class="is-header-all-wrappers">
            <div>
                <div class="is-header-all-wrappers padding">
                    <div class="is-header-all-container padding">
                        <header class="header-u-flex">
                            <div class="header-left-side-wrap">
                                <div class="header-left-title">@if($name){!! $name !!}@endif</div>
                            </div>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>