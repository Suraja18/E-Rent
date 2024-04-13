<x-users.main.app-layout>
    <x-slot name="head">
        - Maintenance Request
    </x-slot>
    <x-tenants.navbar />
    
    <!-- Start Banners --> 
    <div class="is-tenant-banners">
        <div class="is-header-all-container">
            <div class="pt-20p hide">
                <ul class="banner-header-links">
                    <li class="banner-header-name">
                        <a href="{!! route('tenant.dashboard') !!}" class="banner-link-for-header">Home</a>
                    </li>
                    <li class="banner-header-name">
                        /<a href="{!! route('tenant.maintenanceRequest') !!}" class="banner-link-for-header"> Maintainance Request</a>
                    </li>
                    <li class="banner-header-name">
                        /<span class="banner-link-for-header for-normal">#{!! $requests->id !!}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="is-header-all-wrappers mob-nav">
            <div class="is-header-all-wrappers mob-nav">
                <div>
                    <div class="main-containers">
                        <div>
                            <div class="is-header-all-wrappers mob-nav">
                                <div class="upper-section-view-maintain">
                                    <header class="header-panel-maintain is-header-req">
                                        <div style="display: block; margin-right: 10px;">
                                            <a href="{!! route('tenant.maintenanceRequest') !!}" class="btn-back">
                                                <img src="{!! asset('Images/Original/Request/leftArrow-purple.svg') !!}" alt="left-back-btn" class="left-back-btn">
                                            </a>
                                        </div>
                                        <h2 class="mobile-panel-title">Maintainance Request</h2>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-body-container">
                                            <div class="header-panel-body-row">
                                                <div>
                                                    <div class="is-header-req">
                                                        <h2 class="mobile-panel-title">
                                                            <img src="{!! asset('Images/Original/Request/hagtag.svg') !!}" alt="hagtag" class="badges-icons-hagtag">
                                                            No. <span>{!! $requests->id !!}</span>
                                                        </h2>
                                                        <div class="left-head-panel">
                                                            <div class="p-r">
                                                                <button type="button" class="btn-panel-stat">
                                                                    <div class="header-panep-type-des desc for-mobe">
                                                                        <div class="card-status-checked @if($requests->status == 'Cancelled') card-cancelled @elseif($requests->status == 'In Progress') card-in-progress @elseif($requests->status == 'Completed') card-resolved @else card-new @endif">
                                                                            {!! $requests->status !!}
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="is-header-content-req">
                                                        <div style="display: grid; justify-content: start;">
                                                            <p class="is-category-item-head">
                                                                <img src="{!! asset('Images/Original/Request/droplet.svg') !!}" alt="droplet" class="badges-icons">
                                                                <span>{!! $requests->rentedProperty->rentProperty->building->name !!}</span>
                                                            </p>
                                                        </div>
                                                        <div class="header-panel-type">
                                                            <p class="header-panep-type-des"> @if($requests->rentedProperty->rentProperty->rent_name) {!! $requests->rentedProperty->rentProperty->rent_name . " / " !!} @else {!! $requests->rentedProperty->rentProperty->building->name . " / " !!} @endif {!! $requests->rentedProperty->rentProperty->unit->building_unit !!}</p>
                                                            <div class="header-panep-type-des desc">
                                                                <div class="card-status-checked @if($requests->status == 'Cancelled') card-cancelled @elseif($requests->status == 'In Progress') card-in-progress @elseif($requests->status == 'Completed') card-resolved @else card-new @endif">
                                                                    {!! $requests->status !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <section>
                                                <div class="is-header-req mb-20px mb">
                                                    <h2 class="mobile-panel-title">
                                                        <img src="{!! asset('Images/Original/Request/housewind.svg') !!}" alt="hagtag" class="badges-icons-hagtag">
                                                        <span>Maintenance Request</span>
                                                    </h2>
                                                </div>
                                                <div class="is-header-content-req mb-20px">
                                                    <div>
                                                        <div class="property-address-card">
                                                            <button type="button" class="address-btns">
                                                                <div class="avatar-home-icons"></div>
                                                                <span> {!! $requests->title !!} </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="is-header-content-req">
                                                    <h4 class="desc-title-head">Description</h4>
                                                    <div>
                                                        <div class="description title-head color-navy">{!! $requests->description !!}</div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="is-header-all-wrappers mob-nav">
                                <div class="upper-section-view-maintain">
                                    <header class="header-panel-maintain is-header-req">
                                        <div style="display: block; margin-right: 10px;">
                                            <div class="btn-back">
                                                <img src="{!! asset('Images/Original/Request/useroutlet.svg') !!}" alt="left-back-btn" class="left-back-btn">
                                            </div>
                                        </div>
                                        <h2 class="mobile-panel-title">Request Information</h2>
                                        <span class="mobile-panel-sub-title">(Details)</span>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-inner-wrap">
                                            <div class="header-panel-inner-wrapper">
                                                <ul class="info-grid-list">
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Priority :</p>
                                                        <p class="info-grid-items">{!! $requests->piority !!}</p>
                                                    </li>
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Date initiated :</p>
                                                        <p class="info-grid-items">{!! $requests->date !!}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="is-header-all-wrappers mob-nav">
                                <div class="upper-section-view-maintain">
                                    <header class="header-panel-maintain is-header-req">
                                        <div style="display: block; margin-right: 10px;">
                                            <div class="btn-back">
                                                <img src="{!! asset('Images/Original/Request/stat.svg') !!}" alt="left-back-btn" class="left-back-btn">
                                            </div>
                                        </div>
                                        <h2 class="mobile-panel-title">Tenants Information</h2>
                                        <span class="mobile-panel-sub-title">(Details)</span>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-inner-wrap">
                                            <div class="header-panel-inner-wrapper">
                                                <ul class="info-grid-list">
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Name :</p>
                                                        <p class="info-grid-items">{!! $requests->rentedProperty->tenant->first_name !!} {!! $requests->rentedProperty->tenant->last_name !!}</p>
                                                    </li>
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Address :</p>
                                                        <p class="info-grid-items">{!! $requests->rentedProperty->tenant->address !!}</p>
                                                    </li>
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Contact :</p>
                                                        <p class="info-grid-items">{!! $requests->rentedProperty->tenant->phone_number !!}</p>
                                                    </li>
                                                </ul>
                                                <ul class="info-grid-list">
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Availability Time 1 :</p>
                                                        <p class="info-grid-items">{{ date('h:i A', strtotime($requests->time1)) }}</p>
                                                    </li>
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Availability Time 2 :</p>
                                                        <p class="info-grid-items">{{ date('h:i A', strtotime($requests->time2)) }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="is-header-all-wrappers mob-nav">
                                <div class="upper-section-view-maintain">
                                    <header class="header-panel-maintain is-header-req">
                                        <div style="display: block; margin-right: 10px;">
                                            <div class="btn-back">
                                                <img src="{!! asset('Images/Original/Request/paperclip.svg') !!}" alt="left-back-btn" class="left-back-btn">
                                            </div>
                                        </div>
                                        <h2 class="mobile-panel-title">Attachments</h2>
                                        <span class="mobile-panel-sub-title">(0 records)</span>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-inner-wrap">
                                            @if ($requests->image)
                                                <img src="{!! asset($requests->image) !!}">
                                            @endif
                                            @if ($requests->video)
                                                <video controls class="video-control">
                                                    <source src="{!! asset($requests->video) !!}" type="video/mp4" >
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="req-footers">
                                <span class="color-navy">Created by {!! $requests->rentedProperty->tenant->first_name !!} {!! $requests->rentedProperty->tenant->last_name !!} on</span>
                                <span class="color-navy">{!! $requests->created_at->toDateString() !!} ({!! $requests->created_at->diffForHumans() !!})</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banners -->

    <x-tenants.footer />
</x-users.main.app-layout>
    