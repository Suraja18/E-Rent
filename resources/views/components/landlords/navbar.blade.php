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
@endphp
<section id="landlordBody" class="special-container">
    <div class="landlordBody d-flex">
            <!-- Navbar especially for Mobile Phones --> 
    <div class="mobile-below-nav-containers">
        <div class="nav-mobile-grid no-wrap" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.dashboard') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.dashboard') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="small-text">Home</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.maintenance.index') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.maintenance.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg>
                        <p class="small-text">Request</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('payment.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('payment.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM128 416H64V352c35.3 0 64 28.7 64 64zM64 224V160h64c0 35.3-28.7 64-64 64zM448 352c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM252 208c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z"/></svg>
                        <p class="small-text">Payment</p>
                    </a>
                </div>
            </div>
            
            <div class="nav-mobile-grid" role="listitem">
                <div class="p-r nav-mobile-below-whole-containers">
                    <a href="{!! route('landlord.sendMessage') !!}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.sendMessage') active @endif">
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
                    <button class="nav-icons-for-mobile @if(request()->routeIs('building.*') || request()->routeIs('unit.*') || request()->routeIs('house-sell.*') || request()->routeIs('landlord.email.*') || request()->routeIs('rent.*') || request()->routeIs('landlord.property.rent.*') || request()->routeIs('approve.*') || request()->routeIs('landlord.maintenance.complete') || request()->routeIs('forum.*') || Route::currentRouteName() == 'landlord.manual' || request()->routeIs('landlord.tenant.active.*') || request()->routeIs('landlord.tenant.deposit') || request()->routeIs('landlord.contact') || request()->routeIs('landlord.add.friends')) active @endif" type="button" id="navMoreButton">
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
        <div class="nav-mobile-grid" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('building.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('building.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z"/></svg>
                        <p class="small-text">Building</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('unit.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('unit.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M480 48c0-26.5-21.5-48-48-48H336c-26.5 0-48 21.5-48 48V96H224V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V96H112V24c0-13.3-10.7-24-24-24S64 10.7 64 24V96H48C21.5 96 0 117.5 0 144v96V464c0 26.5 21.5 48 48 48H304h32 96H592c26.5 0 48-21.5 48-48V240c0-26.5-21.5-48-48-48H480V48zm96 320v32c0 8.8-7.2 16-16 16H528c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM240 416H208c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16zM128 400c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32zM560 256c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H528c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32zM256 176v32c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM112 160c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32zM256 304c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32zM112 320H80c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16zm304-48v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V272c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16zM400 64c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V80c0-8.8 7.2-16 16-16h32zm16 112v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16z"/></svg>
                        <p class="small-text">Unit</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('rent.index') !!}" class="nav-icons-for-mobile @if(request()->routeIs('rent.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3c-.3-.1-.5-.2-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 84c-11 0-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104c0-11-9-20-20-20zM48 352H64c19.5 25.9 44 47.7 72.2 64H64v32H256 448V416H375.8c28.2-16.3 52.8-38.1 72.2-64h16c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V400c0-26.5 21.5-48 48-48z"/></svg>
                        <p class="small-text">House Rent</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('house-sell.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('house-sell.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3c-.3-.1-.5-.2-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 84c-11 0-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104c0-11-9-20-20-20zM48 352H64c19.5 25.9 44 47.7 72.2 64H64v32H256 448V416H375.8c28.2-16.3 52.8-38.1 72.2-64h16c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V400c0-26.5 21.5-48 48-48z"/></svg>
                        <p class="small-text">Property Sell</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.property.rent.index') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.property.rent.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M271.9 4.2c-9.8-5.6-21.9-5.6-31.8 0l-224 128C6.2 137.9 0 148.5 0 160V480c0 17.7 14.3 32 32 32s32-14.3 32-32V178.6L256 68.9 448 178.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V160c0-11.5-6.2-22.1-16.1-27.8l-224-128zM256 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zm-8 280V400h16v88c0 13.3 10.7 24 24 24s24-10.7 24-24V313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3H246.2c-32.4 0-62.1 17.8-77.5 46.3l-37.9 70.3c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L200 313.5V488c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>
                        <p class="small-text">Property Rented</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.property.rent.vacant') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.property.rent.vacant') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M320.7 352c8.1-89.7 83.5-160 175.3-160c8.9 0 17.6 .7 26.1 1.9L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64l.7 0zM496 512a144 144 0 1 0 0-288 144 144 0 1 0 0 288zm59.3-180.7L518.6 368l36.7 36.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L496 390.6l-36.7 36.7c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6L473.4 368l-36.7-36.7c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L496 345.4l36.7-36.7c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                        <p class="small-text">Vacant Property</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('approve.index') !!}" class="nav-icons-for-mobile @if(request()->routeIs('approve.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V256.9L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6h29.7c33.7 0 64.9 17.7 82.3 46.6l44.9 74.7c-16.1 17.6-28.6 38.5-36.6 61.5c-1.9-1.8-3.5-3.9-4.9-6.3L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H152zM432 224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM368 321.6V328c0 8.8 7.2 16 16 16s16-7.2 16-16v-6.4c0-5.3 4.3-9.6 9.6-9.6h40.5c7.7 0 13.9 6.2 13.9 13.9c0 5.2-2.9 9.9-7.4 12.3l-32 16.8c-5.3 2.8-8.6 8.2-8.6 14.2V384c0 8.8 7.2 16 16 16s16-7.2 16-16v-5.1l23.5-12.3c15.1-7.9 24.5-23.6 24.5-40.6c0-25.4-20.6-45.9-45.9-45.9H409.6c-23 0-41.6 18.6-41.6 41.6z"/></svg>
                        <p class="small-text">Approval Request</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.maintenance.complete') }}" class="nav-icons-for-mobile @if(request()->routeIs('landlord.maintenance.complete')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M320 368c0 59.5 29.5 112.1 74.8 144H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L522.1 193.9c-8.5-1.3-17.3-1.9-26.1-1.9c-54.7 0-103.5 24.9-135.8 64H320V208c0-8.8-7.2-16-16-16H272c-8.8 0-16 7.2-16 16v48H208c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h48v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16zm32 0a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm211.3-43.3c-6.2-6.2-16.4-6.2-22.6 0L480 385.4l-28.7-28.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l40 40c6.2 6.2 16.4 6.2 22.6 0l72-72c6.2-6.2 6.2-16.4 0-22.6z"/></svg>
                        <p class="small-text">Property Repaired</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('forum.index') !!}" class="nav-icons-for-mobile @if(request()->routeIs('forum.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/></svg>
                        <p class="small-text">Landlord Forum</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('landlord.email.send') !!}" class="nav-icons-for-mobile @if(request()->routeIs('landlord.email.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M215.4 96H144 107.8 96v8.8V144v40.4 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3V96c0-26.5 21.5-48 48-48h76.6l49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48H416c26.5 0 48 21.5 48 48v44.3l22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4v-89V144 104.8 96H404.2 368 296.6 215.4zM0 448V242.1L217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1V448v0c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v0zM176 160H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                        <p class="small-text">Email</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.manual') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.manual') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/></svg>
                        <p class="small-text">User Manuals</p>
                    </a>
                </div>
            </div>
        </div>
        <h2 class="nav-mobile-heading">Others</h2>
        <div class="nav-mobile-grid" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.tenant.active.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('landlord.tenant.active.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                        <p class="small-text">Active Tenant</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.tenant.deposit') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.tenant.deposit') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z"/></svg>
                        <p class="small-text">Tenant Deposited</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.add.friends') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.add.friends') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        <p class="small-text">Add Friend</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('landlord.contact') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'landlord.contact') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z"/></svg>
                        <p class="small-text">Contact US</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- End Navbar especially for Mobile Phones -->
        <div id="landlordHeader">
            <header class="owner-header header-desktop">
                <div class="navigationMenu-controls-items header-index" role="list">
                    <div role="listitem" class="mobile-heading-top">
                        <ul class="navigationMenu-controls-items profile-accounts">
                            <li>
                                <div class="mobile-up-head mob-heads">
                                    <span>Dashboard</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div role="listitem" class="left-more-icon">
                        <ul class="navigationMenu-controls-items profile-accounts">
                            <li>
                                <button type="button" class="view-more-link" id="viewMoreLinks">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div role="listitem">
                        <ul class="navigationMenu-controls-items profile-accounts">
                            <li class="p-r hide-600">
                                <a href="{!! route('landlord.sendMessage') !!}" class="view-more-link @if(request()->routeIs('landlord.sendMessage')) active @endif">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256.6 8C116.5 8 8 110.3 8 248.6c0 72.3 29.7 134.8 78.1 177.9 8.4 7.5 6.6 11.9 8.1 58.2A19.9 19.9 0 0 0 122 502.3c52.9-23.3 53.6-25.1 62.6-22.7C337.9 521.8 504 423.7 504 248.6 504 110.3 396.6 8 256.6 8zm149.2 185.1l-73 115.6a37.4 37.4 0 0 1 -53.9 9.9l-58.1-43.5a15 15 0 0 0 -18 0l-78.4 59.4c-10.5 7.9-24.2-4.6-17.1-15.7l73-115.6a37.4 37.4 0 0 1 53.9-9.9l58.1 43.5a15 15 0 0 0 18 0l78.4-59.4c10.4-8 24.1 4.5 17.1 15.6z"/></svg>
                                    @if ($messageCount > 0)
                                        <div class="notification-counter" style="top:0; right:0">
                                            <span class="notification-counter-badge">{{ $messageCount }}</span>
                                        </div>
                                    @endif
                                </a>
                            </li>
                            <li>
                                @php
                                    $unreadCount = Auth::user()->unreadNotifications->count();
                                @endphp
                                <span class="view-more-link p-r">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="notifyButtons" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
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
                                                        <a href="@if(isset($notification->data['tenantMessage'])) {!!  route('approve.store' ) !!} @elseif(isset($notification->data['maintenanceMessage'])) {!! route('landlord.maintenance.index') !!} @elseif(isset($notification->data['friendMessage'])) {!! route('landlord.add.friends') !!} @endif" class="notification-tags" data-notification-id="{{ $notification->id }}">
                                                            <div class="d-flex">
                                                                <div class="margin-tb-auto">
                                                                    <img src="{{ asset('Images/Original/Owners.png') }}" alt="Icons" class="notification-image-avatar">
                                                                </div>
                                                                <div class="notification-contents">
                                                                    <h6 class="uppersection-notify">
                                                                        @if(isset($notification->data['tenantMessage']))
                                                                            {!! $notification->data['tenantMessage'] !!}
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
                                </span>
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
                                                        <a href="{!! route('landlord.profile') !!}" class="avatar-edit-profile-wrappers">
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
                                                                            Landlord
                                                                        </div>
                                                                        <h2 class="avatar-profile-name">{!! $user->first_name !!} {!! $user->last_name !!}</h2>
                                                                    </div>
                                                                    <div class="avatar-email-sub-title">
                                                                        {!! $user->email !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="{!! route('landlord.profile') !!}" class="is-button-for-edit-profile">
                                                            Edit Profile
                                                        </a>
                                                    </div>
                                                    <a href="{!! route('user.logout') !!}" class="avatar-logout nav-icons-for-mobile for-avatar-log">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                                                        <span class="logout-avatar-info">Log out</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </menu>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
        </div>
        <x-common.review-modal />
        <div class="d-flex is-cols">
            <div class="is-header-all-wrappers">
                <div class="is-header-all-wrappers mh-100">
                    <div class="flex-cl-1">
                        <div class="head-body-75 flex-cl-1">
                            <section class="panel-main-container">