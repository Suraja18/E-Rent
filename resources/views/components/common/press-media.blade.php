@php
    if(isset($type) && $type != null)
    {
        $presses = App\Models\PressMedia::latest()->where('id','!=', $type->id)->take(3)->get();
    }
    else {
        $presses = App\Models\PressMedia::latest()->paginate(24); 
    }
    
    $company = App\Models\Company::first();
    $currentRouteName = Route::currentRouteName();
    $routePrefix = explode('.', $currentRouteName)[0];
@endphp
<section class="container pt-7b">
    <div class="hero-content mb-3 text-center">
        <h1 class="text-center">Press & Media</h1>
        <p class="paragraph text-center">Read all about our press and media spotlights. For media enquiries or resources please contact us at <a href="mailto:{!! $company->email !!}" class="email-bold">{!! $company->email !!}</a></p>
    </div>
</section>
<section class="clientSays bg-blue-lighter">
    <div class="container pt-7b">
        <div>
            <div class="roles-three-grid" role="list">
                @forelse ($presses as $press)
                    <div class="roles-content-card" role="listitem" style="max-height: 28rem; overflow:hidden;">
                        <a href="{!! route($routePrefix . '.press-media.single', $press->slug) !!}" target="_blank" class="roles-content-card-links for-news inline-block">
                            <div class="hero-content mt1-5 p2-5">
                                <div class="testimonial-items">
                                    <div class="header-tag is-tags">{!! $press->type !!}</div>
                                    <div class="header-tag is-normal-tags">{{ $press->created_at->format('j M Y') }}</div>
                                </div>
                                <h3 class="heading-med">{!! $press->heading !!}</h3>
                                <div class="news-containers">
                                    <div class="text-sub-headers is-news-containers">{!! $press->description !!}</div>
                                </div>
                            </div>
                            <div class="pd2" style="position: absolute; bottom: 0; width: 100%; background: #fff;">
                                <div class="client-header-link">
                                    <div class="client-btn_text">Read more</div>
                                    <div class="arrow-icon w-embed">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 8H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                            <path d="M9.75732 3.75732L14 7.99996L9.75732 12.2426" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="roles-content-card" role="listitem">
                        No News and Media
                    </div>
                @endforelse
            </div>
            @if(!isset($type))
                <div class="navigation-for-roles pt-4">
                    @if ($presses->onFirstPage())
                        <span class="btnSecondary disabled">
                            <div class="text-btn inline-block">Previous</div>
                        </span>
                    @else
                        <a href="{{ $presses->previousPageUrl() }}" class="btnSecondary">
                            <div class="text-btn inline-block">Previous</div>
                        </a>
                    @endif
                    @foreach ($presses->getUrlRange(1, $presses->lastPage()) as $num => $link)
                        <a href="{{ $link }}" class="btnSecondary {{ $num == $presses->currentPage() ? 'selected' : '' }}">
                            <div class="text-btn inline-block">{{ $num }}</div>
                        </a>
                    @endforeach
                    @if ($presses->hasMorePages())
                        <a href="{{ $presses->nextPageUrl() }}" class="btnSecondary">
                            <div class="text-btn inline-block">Next</div>
                        </a>
                    @else
                        <span class="btnSecondary disabled">
                            <div class="text-btn inline-block">Next</div>
                        </span>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>