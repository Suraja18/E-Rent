@php
    $user = App\Models\User::findOrFail(Illuminate\Support\Facades\Auth::id());
@endphp
<section id="landlordBody" class="special-container">
    <div class="landlordBody d-flex">
            <!-- Navbar especially for Mobile Phones -->  
    <div class="mobile-below-nav-containers">
        <div class="nav-mobile-grid no-wrap" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.dashboard') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'admin.dashboard') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        <p class="small-text">Home</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.company') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'admin.company') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M128 0C92.7 0 64 28.7 64 64V288H19.2C8.6 288 0 296.6 0 307.2C0 349.6 34.4 384 76.8 384H320V288H128V64H448V96h64V64c0-35.3-28.7-64-64-64H128zM512 128H400c-26.5 0-48 21.5-48 48V464c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V256H544c-17.7 0-32-14.3-32-32V128zm32 0v96h96l-96-96z"/></svg>
                        <p class="small-text">Company</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.banners') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.banners')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M0 448c0 35.3 28.7 64 64 64H224V384c0-17.7 14.3-32 32-32H384V64c0-35.3-28.7-64-64-64H64C28.7 0 0 28.7 0 64V448zM171.3 75.3l-96 96c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l96-96c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6zm96 32l-160 160c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l160-160c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6zM384 384H256V512L384 384z"/></svg>
                        <p class="small-text">Banners</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <button class="nav-icons-for-mobile  @if(request()->routeIs('admin.all_tenants') || request()->routeIs('admin.all_landlords')) active @endif" type="button" id="navMoreButtonProfile">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        <p class="small-text">Users</p>
                    </button>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <button class="nav-icons-for-mobile  @if(request()->routeIs('admin.intro') || request()->routeIs('admin.infinity') || request()->routeIs('admin.infinity.images') || request()->routeIs('admin.history') || request()->routeIs('admin.advertising.*') || request()->routeIs('press.*') || request()->routeIs('service.*') || request()->routeIs('admin.rates.*') || request()->routeIs('use-case.*') || request()->routeIs('case.*') || request()->routeIs('roles-desc.*') || request()->routeIs('roles.*') || request()->routeIs('help-centre.*') || request()->routeIs('admin.contact.*') || request()->routeIs('admin.rating.*') || request()->routeIs('admin.email.*') ) active @endif" type="button" id="navMoreButton">
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
        <h2 class="nav-mobile-heading">Website Features</h2>
        <div class="nav-mobile-grid" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.intro') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.intro')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
                        <p class="small-text">About Intro</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.infinity') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.infinity')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                        <p class="small-text">Infinity About</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('admin.infinity.images') !!}" class="nav-icons-for-mobile @if(request()->routeIs('admin.infinity.images')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm152 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z"/></svg>
                        <p class="small-text">Infinity Images</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.history') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.history')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg>
                        <p class="small-text">About History</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('press.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('press.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M256 0H576c35.3 0 64 28.7 64 64V288c0 35.3-28.7 64-64 64H256c-35.3 0-64-28.7-64-64V64c0-35.3 28.7-64 64-64zM476 106.7C471.5 100 464 96 456 96s-15.5 4-20 10.7l-56 84L362.7 169c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h80 48H552c8.9 0 17-4.9 21.2-12.7s3.7-17.3-1.2-24.6l-96-144zM336 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM64 128h96V384v32c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V384H512v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192c0-35.3 28.7-64 64-64zm8 64c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V312c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H72zm336 16v16c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H424c-8.8 0-16 7.2-16 16z"/></svg>
                        <p class="small-text">Press & Media</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.rates.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.rates.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M640 64L435.8 463.2H244l85.5-165.5h-3.8C255.1 389.3 149.9 449.5 0 463.2V300.1s95.9-5.7 152.3-64.9H0V64H171.1V204.8l3.8 0L244.9 64H374.3V203.9l3.8 0L450.7 64H640z"/></svg>
                        <p class="small-text">Elements</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('service.index') !!}" class="nav-icons-for-mobile @if(request()->routeIs('service.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M176 88l0 40 160 0 0-40c0-4.4-3.6-8-8-8L184 80c-4.4 0-8 3.6-8 8zm-48 40l0-40c0-30.9 25.1-56 56-56l144 0c30.9 0 56 25.1 56 56l0 40 28.1 0c12.7 0 24.9 5.1 33.9 14.1l51.9 51.9c9 9 14.1 21.2 14.1 33.9l0 92.1-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32-128 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L0 320l0-92.1c0-12.7 5.1-24.9 14.1-33.9l51.9-51.9c9-9 21.2-14.1 33.9-14.1l28.1 0zM0 416l0-64 128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0c0 17.7 14.3 32 32 32s32-14.3 32-32l128 0 0 64c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64z"/></svg>
                        <p class="small-text">Services</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.advertising.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.advertising.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M224 150.7l42.9 160.7h-85.8L224 150.7zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-65.3 325.3l-94.5-298.7H159.8L65.3 405.3H156l111.7-91.6 24.2 91.6h90.8z"/></svg>
                        <p class="small-text">Advertising</p>
                    </a>
                </div>
            </div>
        </div>
        <h2 class="nav-mobile-heading">User Information</h2>
        <div class="nav-mobile-grid" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('roles.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('roles.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M271.9 4.2c-9.8-5.6-21.9-5.6-31.8 0l-224 128C6.2 137.9 0 148.5 0 160V480c0 17.7 14.3 32 32 32s32-14.3 32-32V178.6L256 68.9 448 178.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V160c0-11.5-6.2-22.1-16.1-27.8l-224-128zM256 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zm-8 280V400h16v88c0 13.3 10.7 24 24 24s24-10.7 24-24V313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3H246.2c-32.4 0-62.1 17.8-77.5 46.3l-37.9 70.3c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L200 313.5V488c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>
                        <p class="small-text">User Roles</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('roles-desc.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('roles-desc.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm0-192c-8.8 0-16 7.2-16 16v80c0 8.8 7.2 16 16 16s16-7.2 16-16V288c0-8.8-7.2-16-16-16z"/></svg>
                        <p class="small-text">Roles Description</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('use-case.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('use-case.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>
                        <p class="small-text">Use Cases</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('case.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('case.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v48H368c-8.8 0-16 7.2-16 16s7.2 16 16 16h48v48c0 8.8 7.2 16 16 16s16-7.2 16-16V384h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H448V304z"/></svg>
                        <p class="small-text">Case Description</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{!! route('admin.rating.index') !!}" class="nav-icons-for-mobile @if(request()->routeIs('admin.rating.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <p class="small-text">Rating</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.contact.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.contact.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z"></path></svg>
                        <p class="small-text">All Contact</p>
                    </a>
                </div> 
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.email.send') }}" class="nav-icons-for-mobile @if(request()->routeIs('admin.email.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M215.4 96H144 107.8 96v8.8V144v40.4 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3V96c0-26.5 21.5-48 48-48h76.6l49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48H416c26.5 0 48 21.5 48 48v44.3l22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4v-89V144 104.8 96H404.2 368 296.6 215.4zM0 448V242.1L217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1V448v0c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v0zM176 160H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                        <p class="small-text">Send Email</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('help-centre.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('help-centre.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                        <p class="small-text">Help Centre</p>
                    </a>
                </div>
            </div>
            
        </div>
        <h2 class="nav-mobile-heading">Others</h2>
        <div class="nav-mobile-grid no-justify" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('frequently.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('frequently.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 320 512"><path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                        <p class="small-text">FAQs</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('question.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('question.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM105.8 229.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L216 328.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V314.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H158.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM160 416a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                        <p class="small-text">Tenant Questions</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('policy.index') }}" class="nav-icons-for-mobile @if(request()->routeIs('policy.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        <p class="small-text">Policy</p>
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
        <div class="nav-mobile-grid no-justify" role="list">
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.all_tenants') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'admin.all_tenants') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                        <p class="small-text">Tenants</p>
                    </a>
                </div>
            </div>
            <div class="nav-mobile-grid" role="listitem">
                <div class="nav-mobile-below-whole-containers">
                    <a href="{{ route('admin.all_landlords') }}" class="nav-icons-for-mobile @if(Route::currentRouteName() == 'admin.all_landlords') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M224 16c-6.7 0-10.8-2.8-15.5-6.1C201.9 5.4 194 0 176 0c-30.5 0-52 43.7-66 89.4C62.7 98.1 32 112.2 32 128c0 14.3 25 27.1 64.6 35.9c-.4 4-.6 8-.6 12.1c0 17 3.3 33.2 9.3 48H45.4C38 224 32 230 32 237.4c0 1.7 .3 3.4 1 5l38.8 96.9C28.2 371.8 0 423.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-58.5-28.2-110.4-71.7-143L415 242.4c.6-1.6 1-3.3 1-5c0-7.4-6-13.4-13.4-13.4H342.7c6-14.8 9.3-31 9.3-48c0-4.1-.2-8.1-.6-12.1C391 155.1 416 142.3 416 128c0-15.8-30.7-29.9-78-38.6C324 43.7 302.5 0 272 0c-18 0-25.9 5.4-32.5 9.9c-4.8 3.3-8.8 6.1-15.5 6.1zm56 208H267.6c-16.5 0-31.1-10.6-36.3-26.2c-2.3-7-12.2-7-14.5 0c-5.2 15.6-19.9 26.2-36.3 26.2H168c-22.1 0-40-17.9-40-40V169.6c28.2 4.1 61 6.4 96 6.4s67.8-2.3 96-6.4V184c0 22.1-17.9 40-40 40zm-88 96l16 32L176 480 128 288l64 32zm128-32L272 480 240 352l16-32 64-32z"/></svg>
                        <p class="small-text">Landlords</p>
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
                                                                            Admin
                                                                        </div>
                                                                        <h2 class="avatar-profile-name">{!! $user->first_name !!} {!! $user->last_name !!}</h2>
                                                                    </div>
                                                                    <div class="avatar-email-sub-title">
                                                                        {!! $user->email !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="{!! route('admin.profile') !!}" class="is-button-for-edit-profile">
                                                            Profile
                                                        </a>
                                                    </div>
                                                    <a href="{!! route('admin.logout') !!}" class="avatar-logout nav-icons-for-mobile for-avatar-log">
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
        <div class="d-flex is-cols">
            <div class="is-header-all-wrappers">
                <div class="is-header-all-wrappers mh-100">
                    <div class="flex-cl-1">
                        <div class="head-body-75 flex-cl-1">
                            <section class="panel-main-container">