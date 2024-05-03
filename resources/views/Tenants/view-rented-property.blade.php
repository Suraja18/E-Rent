<x-users.main.app-layout>
    <x-slot name="head">
        - Rented Property
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
                        /<span class="banner-link-for-header for-normal">{!! "Property List" !!}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="is-header-all-wrappers">
            <div class="is-header-all-wrappers">
                <div>
                    <h2 class="header-f0r-mobile text-center">Rented Property List</h2>
                    <div class="is-header-all-wrappers padding">
                        <div class="is-header-all-container padding">
                            <header class="header-u-flex">
                                <div class="header-left-side-wrap">
                                    <div class="header-left-title">Rented Property List</div>
                                    <p>{!! $count !!} Total</p>
                                </div>
                                <div class="header-right-side-wrap">
                                    <a href="{!! route('tenant.payment_history') !!}" class="is-button-for-edit-profile">
                                        Payment History 
                                    </a>
                                </div>
                            </header>
                            <div class="status-maintainance">
                                <div class="status-maintainance-container">
                                    <div class="status-filter">
                                        <div class="status-filter-wrappers p-r">
                                            <div class="status-filter-container-list" id="statusFullWrapper">
                                                <button type="button" class="button-close-for-filter"></button>
                                                <div class="filter-inside-text" id="insideTheBox">
                                                    <span class="mr-5p">Status</span>
                                                    <!-- <span class="status-filters fw-600">In Progress</span> -->
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="15" width="28" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                            </div>
                                            <div class="status-other-option-container" id="statusFullOption">
                                                <form class="status-other-option-wrapper" action="{!! route('tenant.property.status.search') !!}" method="POST">
                                                    @csrf
                                                    <div class="popup-header">
                                                        <h3 class="popup-header-text">Status</h3>
                                                    </div>
                                                    <div class="pb-10p">
                                                        <div class="popup-content">
                                                            <div>
                                                                <select class="multi-scroll" placeholder="Status" name="selectStatus">
                                                                    <option value="New">New</option>
                                                                    <option value="Approved">Approved</option>
                                                                    <option value="Confirmed">Confirmed</option>
                                                                    <option value="Cancelled">Cancelled</option>
                                                                    <option value="Checked Out">Checked Out</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="popup-footer">
                                                        <button type="submit" class="is-button-for-edit-profile btn-Primary">Apply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="maintainance-request-grid">
                                <div class="maintainance-grid-column">
                                    <div role="list">
                                        
                                        @forelse ($properties as $property_rent)
                                            <div role="listitem">
                                                <div class="maintainance-card card-horizontal">
                                                    <div class="card-extra-content">
                                                        <div class="extra-card-id">#{!! $property_rent->rentProperty->id !!}</div>
                                                    </div>
                                                    <div class="card-title card-title-box">
                                                        <div class="maintenance-list-item-title">
                                                            {!! $property_rent->rentProperty->building->name !!} @if(isset($property_rent->rentProperty->rent_name)) / {!! $property_rent->rentProperty->rent_name !!} @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-left-part">
                                                        @if($property_rent->status == 'New')
                                                            <div class="card-status-checked card">New</div>
                                                        @elseif ($property_rent->status == 'Cancelled')
                                                            <div class="card-status-checked card-cancelled">Cancelled</div>
                                                        @elseif ($property_rent->status == 'Approved')
                                                            <div class="card-status-checked card-resolved">Approved</div>
                                                        @elseif ($property_rent->status == 'Confirmed')
                                                            <div class="card-status-checked card-resolved">Confirmed</div>
                                                        @elseif ($property_rent->status == 'Checked Out')
                                                            <div class="card-status-checked card-in-progress">Checked Out</div>
                                                        @endif
                                                    </div>
                                                    <div class="card-avatar-icons">
                                                        <div>
                                                            <div class="avatar-profile-imgs">
                                                                <div class="avatar-info-profile">
                                                                    <div href="#" class="avatar-info-profile-imgs">
                                                                        <div class="profile-avatar-img">
                                                                            <div class="profile-avatar-img-wrapper">
                                                                                <img src="@if(isset($property_rent->rentProperty->image_1)) {!! asset($property_rent->rentProperty->image_1) !!} @else {!! asset($property_rent->rentProperty->building->image_1) !!} @endif" class="profile-avatar-image" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-address-description">
                                                        <div id="cardAddressDescription">
                                                            <div class="maintenance-list-item-title">{!! $property_rent->rentProperty->building->address !!}</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-maintainance-hurry">
                                                        <div class="card-maint">
                                                            @if($property_rent->rentProperty->type == "Rent") 
                                                                {!! $property_rent->rentProperty->monthly_house_rent - $property_rent->discount !!} 
                                                            @else
                                                                {!! $property_rent->rentProperty->price - $property_rent->discount !!} 
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @php
                                                        if(isset($property_rent->rentProperty->slug)){
                                                            $slug = $property_rent->rentProperty->slug;
                                                        }else{
                                                            $slug = $property_rent->rentProperty->building->slug;
                                                        }

                                                        if($property_rent->status == "Confirmed")
                                                        {
                                                            $rentedProperty = $property_rent;
                                                            if ($rentedProperty->rentProperty->type == "Rent") {
                                                                $rentPrice = $rentedProperty->rentProperty->monthly_house_rent +
                                                                    $rentedProperty->rentProperty->electric_charge +
                                                                    $rentedProperty->rentProperty->water_charge +
                                                                    $rentedProperty->rentProperty->garbage_charge -
                                                                    $rentedProperty->discount;
                                                            } elseif ($rentedProperty->rentProperty->type == "Sell") {
                                                                $rentPrice = $rentedProperty->rentProperty->price - $rentedProperty->discount;
                                                            }
                                                            $totalPaid = 0 - $rentPrice;
                                                            $paymentPrevious = App\Models\RentPayment::where('rented_id', $rentedProperty->id)->where('payment_type', 'Deposit')->get();
                                                            $paymentrent = App\Models\RentPayment::where('rented_id', $rentedProperty->id)->first();
                                                            $payments = App\Models\RentPayment::where('rented_id', $rentedProperty->id)->get();
                                                            foreach ($payments as $payment) {
                                                                $totalPaid += $payment->amt_paid;
                                                            }
                                                            if($paymentrent)
                                                            {
                                                                $createdAt = Carbon\Carbon::parse($paymentrent->created_at);
                                                                $today = Carbon\Carbon::today();     
                                                                $diffInMonths = $createdAt->diffInMonths($today);
                                                            }
                                                            $rentToPay = 0;
                                                            $remainToPay = 0;
                                                            if(isset($diffInMonths)){
                                                                for($i = 0; $i < $diffInMonths; $i++)
                                                                {
                                                                    $rentToPay = $rentToPay + $rentPrice;
                                                                }
                                                            }
                                                            $remainingAmount = $rentToPay - $totalPaid;
                                                            $status = $remainingAmount > 0 ? 'Unpaid' : 'Paid';
                                                        }
                                                    @endphp
                                                    <div class="card-view-btn unpaid">
                                                        
                                                            @if($property_rent->status == "Approved" || $property_rent->status == "New" )
                                                                <a class="status-links view-btn dangers">Unpaid</a>
                                                            @else
                                                                @if($status == "Unpaid")
                                                                    <a class="status-links view-btn dangers">{!! $status !!}</a>
                                                                @elseif($status == "Paid")
                                                                    <a class="status-links view-btn">{!! $status !!}</a>
                                                                @endif
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="card-right-grid">
                                                        <div class="d-flex p-r">
                                                            <div class="d-print-icon"></div>
                                                            <div>
                                                                <div id="moreIcons">
                                                                    <button type="button" role="button" class="btn-more-option">
                                                                        <div class="btn-icons-more"></div>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="more-info-for-maintainance">
                                                                <div class="p-10p">
                                                                    @if($property_rent->status == "Approved" || $property_rent->status == "Confirmed" )
                                                                    <div class="btn-container-opt below">
                                                                            <a href="{!! route('tenant.make.payment', $slug) !!}" class="upper-btn">Pay Rent</a>
                                                                    </div>
                                                                    @endif
                                                                    <div class="btn-container-opt below">
                                                                        <a href="{!! route('tenant.display.property', $slug) !!}" class="upper-btn">View</a>
                                                                    </div>
                                                                    <div class="btn-container-opt">
                                                                        <form action="{!! route('tenant.property.delete', $slug) !!}" method="POST" id="deleteTables{!! $property_rent->id !!}">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <input type="button" value="Delete" class="lower-btn" onclick="return confirmDelete('deleteTables{!! $property_rent->id !!}')" />
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="placeholder no-request">
                                                <div class="placeholder-container">
                                                    <div class="placeholder-grid opacity-low">
                                                        <ul class="loading-req">
                                                            <li class="placeholder-card">
                                                                <span class="placeholder-bar-progress"></span>
                                                            </li>
                                                            <li class="placeholder-card">
                                                                <span class="placeholder-bar-progress"></span>
                                                            </li>
                                                        </ul>
                                                        <div class="placeholder-grid no-req">
                                                            <svg height="35" width="35" class="mb-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" fill="#3d3975"/>
                                                            </svg>
                                                            <div class="placeholder-sub-header">
                                                                No Property has been Rented
                                                            </div>
                                                            <p class="paragraph text-center text-small-for-mobile"> You can rent or buy a house. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                        
                                    </div>
                                </div>
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
    