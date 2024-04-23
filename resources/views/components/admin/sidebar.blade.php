<div class="landlord-body">
    <!-- Start Sidebar -->
    <section id="sidebar">
        <aside class="app-sidebar" id="appSidebar">
            <div class="app-logo">
                <a href="{!! route('admin.dashboard') !!}" class="logo-grid">
                    <img src="{{ asset('Images/Original/House-Logo.png') }}" alt="House Logo" class="use-case-image-responsive app-logos">
                    <img src="{{ asset('Images/Original/Logo.svg') }}" alt="Logo Name" class="use-case-image-responsive app-logo-name">
                </a>
            </div>
            <sidebar class="sidebar-content-container flex-cl-1">
                <div class="sidebar-content-wrapper flex-cl-1">
                    <nav class="sidebar-content-row o-hidden">
                        <ul class="sidebar-content-menu menu-list" role="list">
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{{ route('admin.dashboard') }}" class="sidebar-link @if(Route::currentRouteName() == 'admin.dashboard') active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg style="margin-top: 7px; height: 32px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M40 0c22.1 0 0 0.9 0-40zM40 320c-22.1 0-40-17.9-40-40l0-48c0-22.1 17.9-40 40-40l48 0c22.1 0 40 17.9 40 40l0 48c0 22.1-17.9 40-40 40l-48 0zM200 192l48 0c22.1 0 40 17.9 40 40l0 48c0 22.1-17.9 40-40 40l-48 0c-22.1 0-40-17.9-40-40l0-48c0-22.1 17.9-40 40-40zM40 160c-22.1 0-40-17.9-40-40L0 72C0 49.9 17.9 32 40 32l48 0c22.1 0 40 17.9 40 40l0 48c0 22.1-17.9 40-40 40l-48 0zM200 32l48 0c22.1 0 40 17.9 40 40l0 48c0 22.1-17.9 40-40 40l-48 0c-22.1 0-40-17.9-40-40l0-48c0-22.1 17.9-40 40-40z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Dashboard </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{{ route('admin.company') }}" class="sidebar-link @if(Route::currentRouteName() == 'admin.company') active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M128 0C92.7 0 64 28.7 64 64V288H19.2C8.6 288 0 296.6 0 307.2C0 349.6 34.4 384 76.8 384H320V288H128V64H448V96h64V64c0-35.3-28.7-64-64-64H128zM512 128H400c-26.5 0-48 21.5-48 48V464c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V256H544c-17.7 0-32-14.3-32-32V128zm32 0v96h96l-96-96z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Company </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{{ route('admin.banners') }}" class="sidebar-link @if(Route::currentRouteName() == 'admin.banners') active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M0 448c0 35.3 28.7 64 64 64H224V384c0-17.7 14.3-32 32-32H384V64c0-35.3-28.7-64-64-64H64C28.7 0 0 28.7 0 64V448zM171.3 75.3l-96 96c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l96-96c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6zm96 32l-160 160c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l160-160c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6zM384 384H256V512L384 384z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Banners </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <span class="sidebar-link @if(request()->routeIs('admin.intro') || request()->routeIs('admin.infinity') || request()->routeIs('admin.infinity.images') || request()->routeIs('admin.history')) active @endif" id="dropdownmaintenance">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header">
                                        About 
                                        <svg class="sidebar-arrowdown arrowDown" loading="lazy" id="expandArrow-maintenance" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
                                    </span>
                                </span>
                                <div class="sidebarDropdown" id="sidebarDropdown-maintenance">
                                    <ul class="sidebar-content-menu sub-menu">
                                        <li role="list" class="for-list">
                                            <a href="{!! route('admin.intro') !!}" class="sidebar-link @if(request()->routeIs('admin.intro')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Intro 
                                                </span>
                                            </a>
                                            <a href="{!! route('admin.infinity') !!}" class="sidebar-link @if(request()->routeIs('admin.infinity')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Infinity Description 
                                                </span>
                                            </a>
                                            <a href="{!! route('admin.infinity.images') !!}" class="sidebar-link @if(request()->routeIs('admin.infinity.images')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm152 32c5.3 0 10.2 2.6 13.2 6.9l88 128c3.4 4.9 3.7 11.3 1 16.5s-8.2 8.6-14.2 8.6H216 176 128 80c-5.8 0-11.1-3.1-13.9-8.1s-2.8-11.2 .2-16.1l48-80c2.9-4.8 8.1-7.8 13.7-7.8s10.8 2.9 13.7 7.8l12.8 21.4 48.3-70.2c3-4.3 7.9-6.9 13.2-6.9z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Infinity Images
                                                </span>
                                            </a>
                                            <a href="{!! route('admin.history') !!}" class="sidebar-link @if(request()->routeIs('admin.history')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    History
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{{ route('press.index') }}" class="sidebar-link @if(request()->routeIs('press.*')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M256 0H576c35.3 0 64 28.7 64 64V288c0 35.3-28.7 64-64 64H256c-35.3 0-64-28.7-64-64V64c0-35.3 28.7-64 64-64zM476 106.7C471.5 100 464 96 456 96s-15.5 4-20 10.7l-56 84L362.7 169c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h80 48H552c8.9 0 17-4.9 21.2-12.7s3.7-17.3-1.2-24.6l-96-144zM336 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM64 128h96V384v32c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V384H512v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192c0-35.3 28.7-64 64-64zm8 64c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V312c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H72zm336 16v16c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H424c-8.8 0-16 7.2-16 16z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Press & Media </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{{ route('admin.rates.index') }}" class="sidebar-link @if(request()->routeIs('admin.rates.*')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M640 64L435.8 463.2H244l85.5-165.5h-3.8C255.1 389.3 149.9 449.5 0 463.2V300.1s95.9-5.7 152.3-64.9H0V64H171.1V204.8l3.8 0L244.9 64H374.3V203.9l3.8 0L450.7 64H640z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Elements </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{{ route('service.index') }}" class="sidebar-link @if(request()->routeIs('service.*')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M640 64L435.8 463.2H244l85.5-165.5h-3.8C255.1 389.3 149.9 449.5 0 463.2V300.1s95.9-5.7 152.3-64.9H0V64H171.1V204.8l3.8 0L244.9 64H374.3V203.9l3.8 0L450.7 64H640z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Service </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{{ route('admin.advertising.index') }}" class="sidebar-link @if(request()->routeIs('admin.advertising.*')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M640 64L435.8 463.2H244l85.5-165.5h-3.8C255.1 389.3 149.9 449.5 0 463.2V300.1s95.9-5.7 152.3-64.9H0V64H171.1V204.8l3.8 0L244.9 64H374.3V203.9l3.8 0L450.7 64H640z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Advertising </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <span class="sidebar-link @if(request()->routeIs('landlord.property.rent.*')) active @endif" id="dropdownpropertyoccupy">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M271.9 4.2c-9.8-5.6-21.9-5.6-31.8 0l-224 128C6.2 137.9 0 148.5 0 160V480c0 17.7 14.3 32 32 32s32-14.3 32-32V178.6L256 68.9 448 178.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V160c0-11.5-6.2-22.1-16.1-27.8l-224-128zM256 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zm-8 280V400h16v88c0 13.3 10.7 24 24 24s24-10.7 24-24V313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3H246.2c-32.4 0-62.1 17.8-77.5 46.3l-37.9 70.3c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L200 313.5V488c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header">
                                        Property Occupants
                                        <svg class="sidebar-arrowdown arrowDown" loading="lazy" id="expandArrow-propertyoccupy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
                                    </span>
                                </span>
                                <div class="sidebarDropdown" id="sidebarDropdown-propertyoccupy">
                                    <ul class="sidebar-content-menu sub-menu">
                                        <li role="list" class="for-list">
                                            <a href="{!! route('landlord.property.rent.index') !!}" class="sidebar-link @if(request()->routeIs('landlord.property.rent.index')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M271.9 4.2c-9.8-5.6-21.9-5.6-31.8 0l-224 128C6.2 137.9 0 148.5 0 160V480c0 17.7 14.3 32 32 32s32-14.3 32-32V178.6L256 68.9 448 178.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V160c0-11.5-6.2-22.1-16.1-27.8l-224-128zM256 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zm-8 280V400h16v88c0 13.3 10.7 24 24 24s24-10.7 24-24V313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3H246.2c-32.4 0-62.1 17.8-77.5 46.3l-37.9 70.3c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L200 313.5V488c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Property Rented 
                                                </span>
                                            </a>
                                            <a href="{!! route('landlord.property.rent.vacant') !!}" class="sidebar-link @if(request()->routeIs('landlord.property.rent.vacant')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M320.7 352c8.1-89.7 83.5-160 175.3-160c8.9 0 17.6 .7 26.1 1.9L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64l.7 0zM496 512a144 144 0 1 0 0-288 144 144 0 1 0 0 288zm59.3-180.7L518.6 368l36.7 36.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L496 390.6l-36.7 36.7c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6L473.4 368l-36.7-36.7c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L496 345.4l36.7-36.7c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Vacant Property
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <span class="sidebar-link @if(request()->routeIs('landlord.tenant.*')) active @endif" id="dropdowntenants">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header">
                                        Tenants 
                                        <svg class="sidebar-arrowdown arrowDown" loading="lazy" id="expandArrow-tenants" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
                                    </span>
                                </span>
                                <div class="sidebarDropdown" id="sidebarDropdown-tenants">
                                    <ul class="sidebar-content-menu sub-menu">
                                        <li role="list" class="for-list">
                                            <a href="{!! route('landlord.tenant.active.index') !!}" class="sidebar-link @if(request()->routeIs('landlord.tenant.active.*')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Active Tenants 
                                                </span>
                                            </a>
                                            <a href="{!! route('landlord.tenant.deposit') !!}" class="sidebar-link @if(request()->routeIs('landlord.tenant.deposit')) active @endif" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Tenants Deposited
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{!! route('payment.index') !!}" class="sidebar-link @if(request()->routeIs('payment.*')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM128 416H64V352c35.3 0 64 28.7 64 64zM64 224V160h64c0 35.3-28.7 64-64 64zM448 352c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM252 208c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Invoice & Payment </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <span class="sidebar-link" id="dropdownreport">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16H304c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16H304c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header">
                                        Reports 
                                        <svg class="sidebar-arrowdown arrowDown" loading="lazy" id="expandArrow-report" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
                                    </span>
                                </span>
                                <div class="sidebarDropdown" id="sidebarDropdown-report">
                                    <ul class="sidebar-content-menu sub-menu">
                                        <li role="list" class="for-list">
                                            <a href="" class="sidebar-link" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM128 256a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM80 432c0-44.2 35.8-80 80-80h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Rent Payment 
                                                </span>
                                            </a>
                                            <a href="" class="sidebar-link" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM305 273L177 401c-9.4 9.4-24.6 9.4-33.9 0L79 337c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L271 239c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Revenue Summary
                                                </span>
                                            </a>
                                            <a href="" class="sidebar-link" role="listitem">
                                                <div class="sidebar-content-linkitem p-r">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM112 192H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                                </div>
                                                <span class="sidebar-content-header">
                                                    Property Occupants
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem"> 
                                <a href="{!! route('forum.index') !!}" class="sidebar-link @if(request()->routeIs('forum.*')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Landlord Forums </span>
                                </a>
                            </li>
                            <li class="border-light-color"></li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{!! route('landlord.view.friends') !!}" class="sidebar-link @if(request()->routeIs('landlord.view.friends')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Friends </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{!! route('landlord.add.friends') !!}" class="sidebar-link @if(request()->routeIs('landlord.add.friends')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Add Friend </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{!! route('landlord.contact') !!}" class="sidebar-link @if(request()->routeIs('landlord.contact')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z"></path></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Contact </span>
                                </a>
                            </li>
                            <li class="mb-5 o-hidden" role="listitem">
                                <a href="{!! route('landlord.email.send') !!}" class="sidebar-link @if(request()->routeIs('landlord.email.*')) active @endif">
                                    <div class="sidebar-content-linkitem p-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M215.4 96H144 107.8 96v8.8V144v40.4 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3V96c0-26.5 21.5-48 48-48h76.6l49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48H416c26.5 0 48 21.5 48 48v44.3l22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4v-89V144 104.8 96H404.2 368 296.6 215.4zM0 448V242.1L217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1V448v0c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v0zM176 160H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                                    </div>
                                    <span class="sidebar-content-header"> Send Email </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </sidebar>
        </aside>
    </section>
    <!-- End Sidebar -->