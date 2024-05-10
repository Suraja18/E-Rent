@php
    if(Route::currentRouteName() == 'tenant.dashboard'){
        $forums = App\Models\Forums::latest()->take(3)->get()->shuffle();
    } else {
        $forums = App\Models\Forums::latest()->get()->shuffle();
    }
@endphp

<section class="p-r universal-forum-grid-container">
    <div class="use-case-containers">
        <div class="use-case-rows">
            <div class="use-case-wrap">
                <h3 class="use-case-feat-head header">Universal Landlord Forms</h3>
                <div class="universal-grid-container">
                    @forelse ($forums as $forum)
                        <a href="{{ route('tenant.forum.detail', $forum->slug) }}" class="forum-containers" target="_blank" role="listitem" style="overflow:hidden">
                            <div class="image-before">
                            <img src="{{ asset('Images/Original/Request/aggrement.svg') }}" alt="icons">
                            </div>
                            <h2 class="grid-header-title text-center ">
                            {{ $forum->heading }}
                            </h2>
                            <div>
                            <span class="text-grid-paragraph">
                                @if(strlen($forum->description) > 100)
                                {!! substr($forum->description, 100) !!}...
                                @endif
                            </span>
                            </div>
                        </a>
                    @empty
                        <h3>No Forums</h3>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
    @if(Route::currentRouteName() == 'tenant.dashboard')
        <div class="text-center">
            <a href="{!! route('tenant.landlord-forum') !!}" class="btn btnPrimary">Show More Forums</a>
        </div>
    @endif
    @if(Route::currentRouteName() == 'tenant.landlord-forum')
        <img width="241" height="521" src="../Images/Original/Request/rightbackgroundcircle.svg" alt="background" class="use-case-image-responsive is-background">
    @endif
</section>