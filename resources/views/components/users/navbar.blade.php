@php
    $company = App\Models\Company::first();
@endphp
<!-- Navbar --> 
<section class="Nav-Navbar">

    <!-- Navbar especially for Mobile Phones --> 
    <div class="mobile-below-nav-containers">
        <div class="nav-mobile-grid no-wrap" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.index') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="small-text">Home</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.about') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.about') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
                        <p class="small-text">About</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.user-role') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.user-role') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                        <p class="small-text">Roles</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.contact') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.contact') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z"/></svg>
                        <p class="small-text">Contact</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <button class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.login' || Route::currentRouteName() == 'user.register') active @endif" type="button" id="navMoreButtonProfile">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <p class="small-text">Profile</p>
                    </button>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <button class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.press-media' || Route::currentRouteName() == 'user.teamManagement' || Route::currentRouteName() == 'user.customer-review' || Route::currentRouteName() == 'user.faqs' || Route::currentRouteName() == 'user.helpCentre') active @endif" type="button" id="navMoreButton">
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
        <h2 class="nav-mobile-heading top">Use Cases</h2>
        <div class="nav-mobile-grid ptb" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.use-case') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.use-case') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                        <p class="small-text">Landlord</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a class="nav-icons-for-mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg>
                        <p class="small-text">Tenants</p>
                    </a>
                </div>
            </div>
        </div>
        <h2 class="nav-mobile-heading">Features</h2>
        <div class="nav-mobile-grid ptb" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.teamManagement') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.teamManagement') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H455.2c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3l-2.9 1.7c-9.2 5.3-20.4 4-29.6-1.3s-16.1-14.5-16.1-25.1v-3.4c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v3.4c0 10.6-6.9 19.8-16.1 25.1s-20.4 6.6-29.6 1.3l-2.9-1.7c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l2.9 1.7c9.2 5.3 13.7 15.8 13.7 26.4s-4.5 21.1-13.7 26.4l-3 1.7c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3l2.9-1.7c9.2-5.3 20.4-4 29.6 1.3s16.1 14.5 16.1 25.1v3.4c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9v-3.4c0-10.6 6.9-19.8 16.1-25.1s20.4-6.6 29.6-1.3l2.9 1.7c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-3-1.7c-9.2-5.3-13.7-15.8-13.7-26.4s4.5-21.1 13.7-26.4l3-1.7zM472 384a40 40 0 1 1 80 0 40 40 0 1 1 -80 0z"/></svg>
                        <p class="small-text">Team management</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.press-media') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.press-media') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
                        <p class="small-text">Press & Media</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.customer-review') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.customer-review') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M256 0h64c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H256c-17.7 0-32-14.3-32-32V32c0-17.7 14.3-32 32-32zM64 64H192v48c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64zM176 437.3c0 5.9 4.8 10.7 10.7 10.7H389.3c5.9 0 10.7-4.8 10.7-10.7c0-29.5-23.9-53.3-53.3-53.3H229.3c-29.5 0-53.3 23.9-53.3 53.3zM288 352a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"/></svg>
                        <p class="small-text">Customer Review</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.faqs') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.faqs') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 320 512"><path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                        <p class="small-text">FAQs</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.helpCentre') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.helpCentre') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                        <p class="small-text">Help Centre</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-more-options for-profile" id="navMoreOptionsProfile">
        <div class="top-sections">
            <svg width="50" height="40" id="dropTheNavProfile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z"/></svg>
        </div>
        <h2 class="nav-mobile-heading top">Profiles</h2>
        <div class="nav-mobile-grid" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.login') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.login') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H392.6c-5.4-9.4-8.6-20.3-8.6-32V352c0-2.1 .1-4.2 .3-6.3c-31-26-71-41.7-114.6-41.7H178.3zM528 240c17.7 0 32 14.3 32 32v48H496V272c0-17.7 14.3-32 32-32zm-80 32v48c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32V272c0-44.2-35.8-80-80-80s-80 35.8-80 80z"/></svg>
                        <p class="small-text">Login</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('user.register') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'user.register') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg>
                        <p class="small-text">Register</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- End Navbar especially for Mobile Phones -->

    <div class="mobile-nav-panel" id="mobileNavPanel">
        <div class="mobile-nav-panel-inner" id="mobileNavPanelInner">
            <div class="footer-middle-part nav-part">
                <a href="{{ route('user.index') }}"
                    class="nav-last-position inline-block">
                    <div
                        class="text-testimonial nav-secondary @if(Route::currentRouteName() == 'user.index') active @endif">Home</div>
                    <div class="mobile-nav"></div>
                </a>
                <a href="{{ route('user.about') }}"
                    class="nav-last-position inline-block">
                    <div
                        class="text-testimonial nav-secondary @if(Route::currentRouteName() == 'user.about') active @endif">About</div>
                    <div class="mobile-nav"></div>
                </a>
                <div id="nav-node-1" class="nav-position"
                    data-nav-id="1">
                    <div class="nav-header-bar" id="navHeaderBar-1"
                        data-nav-id="1">
                        <div
                            class="text-testimonial is-title">Use Cases</div>
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
                                    class="header-tag nav-sub-title">Website Flow</div>
                                <div class="header-tag-list">
                                    <div class="header-subheader-list">
                                        <a href="{{ route('user.use-case') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.use-case') active @endif">Landlord</div>
                                                <div
                                                    class="text--xxs nav-sub">Manage rentals and tenants</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="/Errors/404Error.html"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover">Tenants</div>
                                                <div
                                                    class="text--xxs nav-sub">Pay rent and maintain your rentals</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="nav-node-2" class="nav-position"
                    data-nav-id="2">
                    <div class="nav-header-bar" id="navHeaderBar-2"
                        data-nav-id="2">
                        <div
                            class="text-testimonial is-title @if(Route::currentRouteName() == 'user.user-role' || Route::currentRouteName() == 'user.teamManagement' || Route::currentRouteName() == 'user.customer-review' || Route::currentRouteName() == 'user.press-media' || Route::currentRouteName() == 'user.faqs' || Route::currentRouteName() == 'user.helpCentre') active @endif">Features</div>
                        <img src="{!! asset('Images/Original/downArrow.svg') !!}"
                            class="arrowDown" loading="lazy"
                            alt="Expand arrow" id="expandArrow-2"
                            data-nav-id="2">
                    </div>
                    <div class="nav-contents" id="navContentsOpen-2"
                        data-nav-id="2">
                        <div class="nav-wrapper-section no-margin">
                            <div class="nav-col-2">
                                <div
                                    class="header-tag nav-sub-title">Website Features</div>
                                <div class="header-tag-list">
                                    <div class="header-subheader-list">
                                        <a href="{{ route('user.user-role') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.user-role') active @endif">Roles</div>
                                                <div
                                                    class="text--xxs nav-sub">Streamlining property rentals</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('user.teamManagement') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.teamManagement') active @endif">Team Management</div>
                                                <div
                                                    class="text--xxs nav-sub">Streamlining Communication</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('user.press-media') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.press-media') active @endif">Press & Media</div>
                                                <div
                                                    class="text--xxs nav-sub">Latest News and Media Updates</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('user.customer-review') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.customer-review') active @endif">Customer Reviews</div>
                                                <div
                                                    class="text--xxs nav-sub">Efficient service, user-friendly, reliable rentals for seamless online experiences</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('user.faqs') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.faqs') active @endif">Frequently Asked Questions</div>
                                                <div
                                                    class="text--xxs nav-sub">Mostly Asked Question with Answers Update</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="header-subheader-list">
                                        <a href="{{ route('user.helpCentre') }}"
                                            class="nav-subheader-listitems inline-block"
                                            style="border-color: rgba(0, 0, 0, 0);">
                                            <div class="sub-item_text">
                                                <div
                                                    class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.helpCentre') active @endif">Help Centre</div>
                                                <div
                                                    class="text--xxs nav-sub">Navigating rentals? Find answers for tenants & landlords.</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <a href="{{ route('user.contact') }}"
                    class="nav-last-position inline-block">
                    <div
                        class="text-testimonial nav-secondary @if(Route::currentRouteName() == 'user.contact') active @endif">Contact</div>
                    <div class="mobile-nav"></div>
                </a>
                <div class="nav-mobile-buttons">
                    <div class="nav-buttons">
                        <a href="{{ route('user.login') }}"
                            class="btnPrimary nav inline-block">
                            <div
                                class="text-btn nav-text-color">Login</div>
                        </a>
                        <a href="{{ route('user.register') }}"
                            class="btnSecondary navForm nav inline-block">
                            <div class="btn_text">Register</div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="navigation" id="navigations">
        <div class="navigationMenu">
            <div class="navigationMenu-container">
                <div class="navigationMenu-left">
                    <a href="{{ route('user.index') }}"
                        class="navigationMenu-logo-link inline-block">
                        <img src="{!! asset($company->logo) !!}"
                            loading="lazy"
                            alt="Logo" class="navigationMenu-logo">
                    </a>
                    <div class="navigationMenu-container-inner">
                        <a href="{{ route('user.index') }}"
                            class="navigationMenu-items inline-block"><div
                                class="navigationMenu-items-links @if(Route::currentRouteName() == 'user.index') active @endif">Home</div></a>
                        <a href="{{ route('user.about') }}"
                            class="navigationMenu-items inline-block"><div
                                class="navigationMenu-items-links @if(Route::currentRouteName() == 'user.about') active @endif">About</div></a>
                        <a class="navigationMenu-items inline-block is-pages">
                            <div class="navigationMenu-items-links">
                                Use Cases
                            </div>
                            <div
                                class="navbar-submenu-list is-page-subnav">
                                <div class="header-tag nav-sub-title">Website Flow</div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('user.use-case') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.use-case') active @endif">Landlord</div>
                                    <div class="text--xxs nav-sub">Manage rentals and tenants</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='customerReview.html';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover">Tenants</div>
                                    <div class="text--xxs nav-sub">Pay rent and maintain your rentals</div>
                                </div>
                                
                            </div>

                        </a>
                        <a class="navigationMenu-items inline-block is-pages">
                            <div class="navigationMenu-items-links @if(Route::currentRouteName() == 'user.user-role' || Route::currentRouteName() == 'user.teamManagement' || Route::currentRouteName() == 'user.customer-review' || Route::currentRouteName() == 'user.press-media' || Route::currentRouteName() == 'user.faqs' || Route::currentRouteName() == 'user.helpCentre') active @endif">
                                Features
                            </div> 
                            <div
                                class="navbar-submenu-list is-page-subnav">
                                <div class="header-tag nav-sub-title">Website Features</div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('user.user-role') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.user-role') active @endif">Roles</div>
                                    <div class="text--xxs nav-sub">Streamlining property rentals </div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('user.teamManagement') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.teamManagement') active @endif">Team Management</div>
                                    <div class="text--xxs nav-sub">Streamlining Communication</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('user.press-media') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.press-media') active @endif">Press & Media</div>
                                    <div class="text--xxs nav-sub">Latest News and Media Updates</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('user.customer-review') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.customer-review') active @endif">Customer Reviews</div>
                                    <div class="text--xxs nav-sub">Efficient service, user-friendly, reliable rentals for seamless online experiences.</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('user.faqs') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.faqs') active @endif">Frequently Asked Questions</div>
                                    <div class="text--xxs nav-sub">Mostly Asked Question with Answers Update</div>
                                </div>
                                <div class="navbar-header-tag" onclick="window.location.href='{{ route('user.helpCentre') }}';">
                                    <div class="text-testimonial nav-primary is-green-text-on-hover @if(Route::currentRouteName() == 'user.helpCentre') active @endif">Help Centre</div>
                                    <div class="text--xxs nav-sub">Navigating rentals? Find answers for tenants & landlords.</div>
                                </div>
                            </div>

                        </a>
                        <a href="{{ route('user.contact') }}"
                            class="navigationMenu-items inline-block"><div
                                class="navigationMenu-items-links @if(Route::currentRouteName() == 'user.contact') active @endif">Contact</div></a>
                    </div>
                </div>
                <div class="navigationMenu-right">
                    <div class="navigationMenu-boxLinks">
                        <a href="{{ route('user.login') }}"
                            class="btnPrimary navForm nav navButton">Login</a>
                        <a href="{{ route('user.register') }}"
                            class="btnSecondary nav navButton">Register</a>
                        <div class="nav_icon">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navbar -->