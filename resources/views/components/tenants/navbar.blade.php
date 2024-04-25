@php
    $user = App\Models\User::findOrFail(Illuminate\Support\Facades\Auth::id());
    $userId = Auth::id();
    $messageCount = App\Models\Messages::whereNull('read_at')
        ->where('sent_by', '!=', $userId)
        ->whereIn('friend_id', function ($query) use ($userId) {
            $query->select('id')
                ->from('friends')
                ->where('type', 'Accepted')
                ->where(function ($subQuery) use ($userId) {
                    $subQuery->where('user_id', $userId)
                        ->orWhere('sent_id', $userId);
                });
        })
        ->distinct('friend_id')
        ->count();
    $company = App\Models\Company::first();
@endphp
<!-- Navbar -->
<section class="Nav-Navbar">
    <!-- Navbar especially for Mobile Phones --> 
    <div class="mobile-below-nav-containers">
        <div class="nav-mobile-grid" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.dashboard') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.dashboard') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="small-text">Home</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.about') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.about') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
                        <p class="small-text">About</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.maintenanceRequest') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.maintenanceRequest') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg>
                        <p class="small-text">Request</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('tenant.view.allProperty') !!}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.view.allProperty' || Route::currentRouteName() == 'tenant.showDetail') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 320 512"><path d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"/></svg>
                        <p class="small-text">Rent</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="p-r nav-mobile-below-whole-containers">
                    <a href="{!! route('tenant.sendMessage') !!}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.sendMessage') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M256.6 8C116.5 8 8 110.3 8 248.6c0 72.3 29.7 134.8 78.1 177.9 8.4 7.5 6.6 11.9 8.1 58.2A19.9 19.9 0 0 0 122 502.3c52.9-23.3 53.6-25.1 62.6-22.7C337.9 521.8 504 423.7 504 248.6 504 110.3 396.6 8 256.6 8zm149.2 185.1l-73 115.6a37.4 37.4 0 0 1 -53.9 9.9l-58.1-43.5a15 15 0 0 0 -18 0l-78.4 59.4c-10.5 7.9-24.2-4.6-17.1-15.7l73-115.6a37.4 37.4 0 0 1 53.9-9.9l58.1 43.5a15 15 0 0 0 18 0l78.4-59.4c10.4-8 24.1 4.5 17.1 15.6z"/></svg>
                        <p class="small-text">Chat</p>
                        @if ($messageCount > 0)
                            <div class="notification-counter" style="top:0; right:0">
                                <span class="notification-counter-badge">{{ $messageCount }}</span>
                            </div>
                        @endif
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <button class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.property-types' || Route::currentRouteName() == 'tenant.landlord' || Route::currentRouteName() == 'tenant.property-list' || Route::currentRouteName() == 'tenant.contact' || Route::currentRouteName() == 'tenant.press-media' || Route::currentRouteName() == 'tenant.landlord-forum' || Route::currentRouteName() == 'tenant.customer-review' || Route::currentRouteName() == 'tenant.add-friend') active @endif" type="button" id="navMoreButton">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                        <p class="small-text">More</p>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="nav-more-options" id="navMoreOptions">
        <div class="top-sections">
            <svg width="50" height="40" id="dropTheNav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z"/></svg>
        </div>
        <h2 class="nav-mobile-heading">Property</h2>
        <div class="nav-mobile-grid ptb" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.property-types') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.property-types') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M480 48c0-26.5-21.5-48-48-48H336c-26.5 0-48 21.5-48 48V96H224V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V96H112V24c0-13.3-10.7-24-24-24S64 10.7 64 24V96H48C21.5 96 0 117.5 0 144v96V464c0 26.5 21.5 48 48 48H304h32 96H592c26.5 0 48-21.5 48-48V240c0-26.5-21.5-48-48-48H480V48zm96 320v32c0 8.8-7.2 16-16 16H528c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM240 416H208c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16zM128 400c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32zM560 256c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H528c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32zM256 176v32c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM112 160c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32zM256 304c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32zM112 320H80c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16zm304-48v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM400 64c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V80c0-8.8 7.2-16 16-16h32zm16 112v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16z"/></svg>
                        <p class="small-text">Property Types</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.landlord') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.landlord') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                        <p class="small-text">Landlord</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.property-list') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.property-list') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z"/></svg>
                        <p class="small-text">All Property</p>
                    </a>
                </div>
            </div>
        </div>
        <h2 class="nav-mobile-heading top">Features</h2>
        <div class="nav-mobile-grid ptb" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.add-friend') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.add-friend') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        <p class="small-text">Add Friend</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.landlord-forum') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.landlord-forum') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
                        <p class="small-text">Landlord Forum</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.press-media') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.press-media') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
                        <p class="small-text">Press & Media</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('tenant.customer-review') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.customer-review') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M256 0h64c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H256c-17.7 0-32-14.3-32-32V32c0-17.7 14.3-32 32-32zM64 64H192v48c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64zM176 437.3c0 5.9 4.8 10.7 10.7 10.7H389.3c5.9 0 10.7-4.8 10.7-10.7c0-29.5-23.9-53.3-53.3-53.3H229.3c-29.5 0-53.3 23.9-53.3 53.3zM288 352a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"/></svg>
                        <p class="small-text">Customer Review</p>
                    </a>
                </div>
            </div>
        </div>
        <h2 class="nav-mobile-heading">Contact</h2>
        <div class="nav-mobile-grid single" role="listitem">
            <div class="nav-mobile-below-whole-containers">
                <a href="{{ route('tenant.contact') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.contact') active @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z"/></svg>
                    <p class="small-text">Contact US</p>
                </a>
            </div>
        </div>
    </div>

    <!-- End Navbar especially for Mobile Phones -->

    <!-- Navbar for Responsive Devices -->
    <div class="mobile-nav-panel" id="mobileNavPanel">
        <div class="mobile-nav-panel-inner" id="mobileNavPanelInner">
            <div class="footer-middle-part nav-part">
                <a href="{{ route('tenant.dashboard') }}"
                    class="nav-last-position inline-block">
                    <div
                        class="text-testimonial nav-secondary @if(Route::currentRouteName() == 'tenant.dashboard') active @endif">Home</div>
                    <div class="mobile-nav"></div>
                </a>
                <a href="{{ route('tenant.about') }}"
                    class="nav-last-position inline-block">
                    <div
                        class="text-testimonial nav-secondary @if(Route::currentRouteName() == 'tenant.about') active @endif">About</div>
                    <div class="mobile-nav"></div>
                </a>
                <div id="nav-node-2" class="nav-position"
                    data-nav-id="2">
                    <div class="nav-header-bar" id="navHeaderBar-2"
                        data-nav-id="2">
                        <div
                            class="text-testimonial is-title @if(Route::currentRouteName() == 'tenant.property-list' || Route::currentRouteName() == 'tenant.landlord' || Route::currentRouteName() == 'tenant.property-types') active @endif">Property</div>
                        <img src="{!! asset('Images/Original/downArrow.svg') !!}"
                            class="arrowDown" loading="lazy"
                            alt="Expand arrow" id="expandArrow-2"
                            data-nav-id="2">
                    </div>
                    <div class="nav-contents" id="navContentsOpen-2"
                        data-nav-id="2">
                        <div class="nav-wrapper-section no-margin">
                            <div class="nav-col-1">
                                <div class="header-tag nav-sub-title">Property Center</div>
                                <div class="header-tag-list">
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.property-types') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.property-types') active @endif">Property Type</div>
                                                <div
                                                    class="text--xxs nav-sub">Explore diverse property types with detailed descriptions for informed decisions with E-Rent.</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.landlord') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.landlord') active @endif">Property Owners</div>
                                                <div
                                                    class="text--xxs nav-sub">Make contact with prospective purchasers or landlords.</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.property-list') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.property-list') active @endif">Property List</div>
                                                <div
                                                    class="text--xxs nav-sub">Explore homes for sale using images, details, and categories to ensure a smooth and easy experience with E-Rent.</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="nav-node-1" class="nav-position"
                    data-nav-id="1">
                    <div class="nav-header-bar" id="navHeaderBar-1"
                        data-nav-id="1">
                        <div
                            class="text-testimonial is-title @if(Route::currentRouteName() == 'tenant.add-friend' || Route::currentRouteName() == 'tenant.maintenanceRequest' || Route::currentRouteName() == 'tenant.landlord-forum' || Route::currentRouteName() == 'tenant.press-media' || Route::currentRouteName() == 'tenant.customer-review') active @endif">Features</div>
                        <img src="{!! asset('Images/Original/downArrow.svg') !!}"
                            class="arrowDown" loading="lazy"
                            alt="Expand arrow" id="expandArrow-1"
                            data-nav-id="1">
                    </div>
                    <div class="nav-contents" id="navContentsOpen-1"
                        data-nav-id="1">
                        <div class="nav-wrapper-section no-margin">
                            <div class="nav-col-1">
                                <div
                                    class="header-tag nav-sub-title">Tenants Features</div>
                                <div class="header-tag-list">
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.add-friend') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.add-friend') active @endif">Add Friends</div>
                                                <div
                                                    class="text--xxs nav-sub">Streamline connections: Meet verified Users </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.maintenanceRequest') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.maintenanceRequest') active @endif">Maintenance Request</div>
                                                <div
                                                    class="text--xxs nav-sub">Manage maintenance requests here.</div>
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.landlord-forum') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.landlord-forum') active @endif">Landlord Forum</div>
                                                <div
                                                    class="text--xxs nav-sub">View All Agreement Forum of Landlord.</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.press-media') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.press-media') active @endif">Press & Media</div>
                                                <div
                                                    class="text--xxs nav-sub">Latest News and Media Updates</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('tenant.customer-review') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.customer-review') active @endif">Customer Reviews</div>
                                                <div
                                                    class="text--xxs nav-sub">Efficient service, user-friendly, reliable rentals for seamless online experiences.</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('tenant.contact') }}"
                    class="nav-last-position inline-block">
                    <div
                        class="text-testimonial nav-secondary @if(Route::currentRouteName() == 'tenant.contact') active @endif">Contact</div>
                    <div class="mobile-nav"></div>
                </a>
            </div>

        </div>
    </div>
    <!-- End Navbar for Responsive Devices -->

    <div class="navigation" id="navigations">
        <div class="navigationMenu">
            <div class="navigationMenu-container">
                <div class="navigationMenu-left">
                    <a href="{{ route('tenant.dashboard') }}"
                        class="navigationMenu-logo-link inline-block">
                        <img src="{!! asset($company->logo) !!}"
                            loading="lazy"
                            alt="Logo" class="navigationMenu-logo">
                    </a>
                    <div class="navigationMenu-container-inner">
                        <a href="{{ route('tenant.dashboard') }}"
                            class="navigationMenu-items inline-block"><div
                                class="navigationMenu-items-links @if(Route::currentRouteName() == 'tenant.dashboard') active @endif">Home</div></a>
                        <a href="{{ route('tenant.about') }}"
                            class="navigationMenu-items inline-block"><div
                                class="navigationMenu-items-links @if(Route::currentRouteName() == 'tenant.about') active @endif">About</div></a>
                        <a class="navigationMenu-items inline-block is-contact">
                            <div class="navigationMenu-items-links @if(Route::currentRouteName() == 'tenant.property-list' || Route::currentRouteName() == 'tenant.landlord' || Route::currentRouteName() == 'tenant.property-types') active @endif">Property</div>
                            <div
                                class="navbar-submenu-list is-contact-subnav">
                                <div
                                    class="header-tag nav-sub-title">Property Center</div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.property-types') }}';">
                                    <div
                                        class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.property-types') active @endif">Property Type</div>
                                    <div
                                        class="text--xxs nav-sub">Explore diverse property types with detailed descriptions for informed decisions with E-Rent.</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.landlord') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.landlord') active @endif">Property Owners</div>
                                    <div
                                        class="text--xxs nav-sub">Make contact with prospective purchasers or landlords.</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.property-list') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.property-list') active @endif">Property List</div>
                                    <div
                                        class="text--xxs nav-sub">Explore homes for sale using images, details, and categories to ensure a smooth and easy experience with E-Rent.</div>
                                </div>
                                
                            </div>
                        </a>
                        <a class="navigationMenu-items inline-block is-contact">
                            <div class="navigationMenu-items-links @if(Route::currentRouteName() == 'tenant.add-friend' || Route::currentRouteName() == 'tenant.maintenanceRequest' || Route::currentRouteName() == 'tenant.landlord-forum' || Route::currentRouteName() == 'tenant.press-media' || Route::currentRouteName() == 'tenant.customer-review') active @endif">Features</div>
                            <div
                                class="navbar-submenu-list is-contact-subnav">
                                <div
                                    class="header-tag nav-sub-title">Tenants Features</div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.add-friend') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.add-friend') active @endif">Add Friends</div>
                                    <div
                                        class="text--xxs nav-sub">Streamline connections: Meet verified Users </div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.maintenanceRequest') }}';">
                                    <div
                                        class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.maintenanceRequest' || Route::currentRouteName() == 'tenant.maintenance.*' ) active @endif">Maintainance Request</div>
                                    <div
                                        class="text--xxs nav-sub">Manage maintenance requests here.</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.landlord-forum') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.landlord-forum') active @endif">Landlord Forms</div>
                                    <div
                                        class="text--xxs nav-sub">View All Agreement Forum of Landlord.</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.press-media') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.press-media') active @endif">Press & Media</div>
                                    <div
                                        class="text--xxs nav-sub">Latest News and Media Updates</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('tenant.customer-review') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'tenant.customer-review') active @endif">Customer Review</div>
                                    <div
                                        class="text--xxs nav-sub">Efficient service, user-friendly, reliable rentals for seamless online experiences.</div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('tenant.contact') }}"
                            class="navigationMenu-items inline-block"><div
                                class="navigationMenu-items-links @if(Route::currentRouteName() == 'tenant.contact') active @endif">Contact</div></a>
                    </div>
                </div>
                <div class="navigationMenu-right">
                    <div class="navigationMenu-boxLinks">
                        <ul class="navigationMenu-controls-items">
                            <li class="navigationMenu-controls-list not-mobile">
                                <div class="p-r">
                                    <a href="{{ route('tenant.view.allProperty') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.view.allProperty' || Route::currentRouteName() == 'tenant.showDetail') active @endif">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 320 512"><path d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"/></svg>
                                    </a>
                                </div>
                            </li>
                            <li class="navigationMenu-controls-list">
                                @php
                                    $unreadCount = Auth::user()->unreadNotifications->count();
                                @endphp
                                <div class="p-r">
                                    <a class="nav-icons-for-mobile" id="notifyButtons"> 
                                        <svg height="30" width="35" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112v25.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V208c0-61.9 50.1-112 112-112zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/></svg>
                                    </a>
                                    @if ($unreadCount > 0)
                                        <div class="notification-counter">
                                            <span class="notification-counter-badge">{{ $unreadCount }}</span>
                                        </div>
                                    @endif
                                    <div class="notification-containers" id="notifyCOntainers">
                                        <ul class="ptb-1-lr-1-2"> 
                                            @if (Auth::check())
                                                @foreach (Auth::user()->unreadNotifications as $notification)
                                                    <li class="mb-5 p-r">
                                                        <a href="@if(isset($notification->data['tenantMessage'])) {!!  route('tenant.view.allProperty') !!} @elseif(isset($notification->data['friendMessage'])) {!! route('tenant.add-friend') !!} @elseif(isset($notification->data['rentMessage'])) {!! route('tenant.view.allProperty') !!} @elseif(isset($notification->data['maintenanceMessage'])) {!! route('tenant.maintenanceRequest') !!} @endif" class="notification-tags" data-notification-id="{{ $notification->id }}">
                                                            <div class="d-flex"> 
                                                                <div class="margin-tb-auto">
                                                                    <img src="{{ asset('Images/Original/Owners.png') }}" alt="Icons" class="notification-image-avatar">
                                                                </div>
                                                                <div class="notification-contents">
                                                                    <h6 class="uppersection-notify">
                                                                        @if(isset($notification->data['tenantMessage']))
                                                                            {!! $notification->data['tenantMessage'] !!}
                                                                        @elseif(isset($notification->data['rentMessage']))
                                                                            {!! $notification->data['rentMessage'] !!}
                                                                        @elseif(isset($notification->data['maintenanceMessage']))
                                                                            {!! $notification->data['maintenanceMessage'] !!}
                                                                        @elseif(isset($notification->data['friendMessage']))
                                                                            {!! $notification->data['friendMessage'] !!}
                                                                        @endif
                                                                    </h6>
                                                                    <p class="lowersection-pa">
                                                                        <img src="{{ asset('Images/Original/Icons/clock.svg') }}" alt="clock">

                                                                        {!! $notification->created_at->diffForHumans() !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="navigationMenu-controls-list not-mobile">
                                <div class="p-r">
                                    <a href="{!! route('tenant.sendMessage') !!}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'tenant.sendMessage') active @endif">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M256.6 8C116.5 8 8 110.3 8 248.6c0 72.3 29.7 134.8 78.1 177.9 8.4 7.5 6.6 11.9 8.1 58.2A19.9 19.9 0 0 0 122 502.3c52.9-23.3 53.6-25.1 62.6-22.7C337.9 521.8 504 423.7 504 248.6 504 110.3 396.6 8 256.6 8zm149.2 185.1l-73 115.6a37.4 37.4 0 0 1 -53.9 9.9l-58.1-43.5a15 15 0 0 0 -18 0l-78.4 59.4c-10.5 7.9-24.2-4.6-17.1-15.7l73-115.6a37.4 37.4 0 0 1 53.9-9.9l58.1 43.5a15 15 0 0 0 18 0l78.4-59.4c10.4-8 24.1 4.5 17.1 15.6z"/></svg>
                                        @if ($messageCount > 0)
                                            <div class="notification-counter">
                                                <span class="notification-counter-badge">{{ $messageCount }}</span>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                            </li>
                            <li class="navigationMenu-controls-list profile">
                                <div class="accounts">
                                    <menu class="profile-accounts">
                                        <button type="button" class="btn-profiles" id="profileAvatarButton">
                                            <div class="btn-profile-containers">
                                                <span class="profile-names">{!! $user->first_name !!}</span>
                                                <div class="profile-avatar-img">
                                                    <div class="profile-avatar-img-container">
                                                        @if (!$user->image)
                                                            <div class="profile-avatar-image profile-avatar-no-img">
                                                                {!! substr($user->first_name, 0, 1) !!}
                                                            </div>
                                                        @endif
                                                        @if ($user->image)
                                                            <img src="{!! asset($user->image) !!}" class="profile-avatar-image" alt="{!! $user->first_name !!}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                        <div class="nav-avatar-list" id="profileAvatarOpen">
                                            <div class="avatar-whole-containers">
                                                <div class="avatar-grid-subnav">
                                                    <div class="avatar-edit-profile-container">
                                                        <a href="{!! route('tenant.profile') !!}" class="avatar-edit-profile-wrappers">
                                                            <div class="avatar-profile-container">
                                                                <div class="avatar-profile-imgs">
                                                                    <div class="avatar-info-profile">
                                                                        <div class="avatar-info-profile-imgs">
                                                                            <div class="profile-avatar-img">
                                                                                <div class="profile-avatar-img-wrapper">
                                                                                    @if (!$user->image)
                                                                                        <div class="profile-avatar-image profile-avatar-no-img">
                                                                                            {!! substr($user->first_name, 0, 1) !!}
                                                                                        </div>
                                                                                    @endif
                                                                                    @if ($user->image)
                                                                                        <img src="{!! asset($user->image) !!}" class="profile-avatar-image" alt="{!! $user->first_name !!}">
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-profile-infos">
                                                                    <div class="m-0">
                                                                        <div class="title-owners">
                                                                            Tenant
                                                                        </div>
                                                                        <h2 class="avatar-profile-name">{!! $user->first_name !!} {!! $user->last_name !!}</h2>
                                                                    </div>
                                                                    <div class="avatar-email-sub-title">
                                                                        {!! $user->email !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="{!! route('tenant.profile') !!}" class="is-button-for-edit-profile">
                                                            Edit Profile
                                                        </a>
                                                    </div>
                                                    <div class="avatar-logout nav-icons-for-mobile for-avatar-log">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                                                        <a href="{{ route('user.logout') }}" class="logout-avatar-info">Log out</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </menu>
                                </div>
                            </li>
                        </ul>


                        <!-- Bar Starts Temporary -->
                        <div class="nav_icon tenantsi">
                            <div class="nav_on">
                                <div class="nav_menubar"
                                    id="burger-menu">
                                    <div class="bar bar-1"></div>
                                    <div class="bar bar-2"></div>
                                    <div class="bar bar-3"></div>
                                </div>
                            </div>
                            <div class="nav_off"
                                style="display: none;"></div>
                        </div>
                         <!-- Bar End Temporary -->
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<!-- End Navbar -->
<x-common.review-modal />