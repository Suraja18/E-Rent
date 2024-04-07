<x-users.main.app-layout>
    <x-slot name="head">
        - Approve Rent
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Approve Rent</x-slot>
    </x-landlords.banners>
                           
    @php
        $combinedImages = [];
        $rentProperty = App\Models\RentProperty::where('slug', $property->slug)->first();
        if ($rentProperty) {
            for ($i = 1; $i <= 4; $i++) {
                $imageField = 'image_' . $i;
                if ($rentProperty->$imageField) {
                    $combinedImages[] = $rentProperty->$imageField;
                }
            }
        }
        $buildingImages = App\Models\Building::where('slug', $property->building->slug)->first();
        if ($buildingImages) {
            for ($i = 1; $i <= 4; $i++) {
                $imageField = 'image_' . $i;
                if ($buildingImages->$imageField) {
                    $combinedImages[] = $buildingImages->$imageField;
                }
            }
        }
        $imageCount = count($combinedImages);

        if(isset($property->rentProperty->slug)){
            $slug = $property->slug;
        }else{
            $slug = $property->building->slug;
        }
    @endphp

    {{-- Start View From here --}}
    <div class="is-tenant-banners dis-block">
        <div class="is-header-all-wrappers mob-nav">
            <div class="is-header-all-wrappers mob-nav">
                <div>
                    <div class="main-containers">
                        <div>
                            <div class="is-header-all-wrappers mob-nav">
                                <div class="upper-section-view-maintain">
                                    <header class="header-panel-maintain is-header-req">
                                        <div style="display: block; margin-right: 10px;">
                                            <a href="{!! route('approve.index') !!}" class="btn-back">
                                                <img src="{!! asset('Images/Original/Request/leftArrow-purple.svg') !!}" alt="left-back-btn" class="left-back-btn">
                                            </a>
                                        </div>
                                        <h2 class="mobile-panel-title">Property Rent Details</h2>
                                        <div class="panel-left-wrap">
                                            <div class="panel-left-wrapper">
                                                <div class="panel-controller">
                                                    <div class="panel-left-wrapper">
                                                        <div class="panel-st p-r">
                                                            <button type="button" class="m-button btn-Primary" id="sectionChangeOptionsUhead">Approved</button>
                                                            <div class="status-change-options not-mobile " id="sectionChangeOptionsUbody">
                                                                <form class="status-change-options-container" action="{!! route('approve.update', $rented_property) !!}" method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <h3 class="status-change-options-upper-head">
                                                                        Approve Building Now
                                                                    </h3>
                                                                    <h4 class="status-change-options-upper-head">
                                                                        <div class="mb-1">Discount</div>
                                                                        <input type="number" name="discount" class="form-control table-datas" value="0" />
                                                                    </h4>
                                                                    
                                                                    <footer class="status-change-options-footer">
                                                                        <div class="status-change-option-footer">
                                                                            <button type="button" class="m-button btn-cancel mr-20p" id="btnCancelled">Cancel</button>
                                                                            <button type="submit" class="m-button btn-Primary">Approve</button>
                                                                        </div>
                                                                    </footer>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="m-dots req-btns">
                                                                <button type="button" class="fixed-btns" id="fixMoreButton">
                                                                    <span>Actions</span>
                                                                    <div>
                                                                        <img src="{!! asset('Images/Original/Icons/more.svg') !!}" class="left-back-btn">
                                                                    </div>
                                                                </button>
                                                                <div class="m-dots-popover is-pa" id="mDotsPopUp">
                                                                    <div class="wrapper-for-box-size">
                                                                        <ul class="list-unstyle"> 
                                                                            <li class="m-dot-item" role="listitem">
                                                                                <a href="{!! route('tenant.property.generatePDF', $slug) !!}" class="m-dot-links"> Download</a>
                                                                            </li>   
                                                                            <li class="m-dot-item delete" role="listitem">
                                                                                <form action="{{ route('approve.destroy', $rented_property) }}" method="POST" id="deleteTables{!! $rented_property->id !!}">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <input type="button" value="Decline" class="m-dot-links" onclick="return confirmDelete('deleteTables{!! $rented_property->id !!}')">
                                                                                </form>
                                                                            </li>   
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-body-container">
                                            <div class="header-panel-body-row">
                                                <div>
                                                    <div class="is-header-req">
                                                        <h2 class="mobile-panel-title">
                                                            <img src="{!! asset('Images/Original/Request/hagtag.svg') !!}" alt="hagtag" class="badges-icons-hagtag">
                                                            Property Type: <span>{!! $property->unit->building_unit !!}</span>
                                                        </h2>
                                                        <div class="left-head-panel">
                                                            <div class="p-r">
                                                                <button type="button" class="btn-panel-stat">
                                                                    <div class="header-panep-type-des desc for-mobe p-r">
                                                                        <button type="button" class="header-panel-stat approved bg-no" id="ApproveNowMobile"><span> Approve Now </span></button>
                                                                        <div class="status-change-options not-mob" id="sectionChangeOptionsUbodyMobile">
                                                                            <form class="status-change-options-container" action="{!! route('approve.update', $rented_property) !!}" method="POST">
                                                                                @method('PUT')
                                                                                @csrf
                                                                                <h3 class="status-change-options-upper-head">
                                                                                    Approve Building Now
                                                                                </h3>
                                                                                <h4 class="status-change-options-upper-head">
                                                                                    <div class="mb-1">Discount</div>
                                                                                    <input type="number" name="discount" class="form-control table-datas" value="0" />
                                                                                </h4>
                                                                                
                                                                                <footer class="status-change-options-footer">
                                                                                    <div class="status-change-option-footer">
                                                                                        <button type="button" class="m-button btn-cancel mr-20p" id="btnCancelledMobile">Cancel</button>
                                                                                        <button type="submit" class="m-button btn-Primary">Approve</button>
                                                                                    </div>
                                                                                </footer>
                                                                            </form>
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
                                                                <span>{!! $property->building->name !!}</span>
                                                            </p>
                                                        </div>
                                                        {{-- <div class="header-panel-type">
                                                            <p class="header-panep-type-des"> @if($property->type == 'Rent'){!! $property->rent_name !!}@elseif($property->type == 'Sell'){!! $property->building->name !!}@endif </p>
                                                            <div class="header-panep-type-des desc">
                                                                @if(Route::currentRouteName() == 'tenant.showDetail' || ($property->rentedProperty && $property->rentedProperty->status == "New"))
                                                                    <p class="header-panel-stat"><span> New </span></p>
                                                                @elseif ($property->rentedProperty && $property->rentedProperty->status == 'Cancelled')
                                                                    <p class="header-panel-stat cancelled"><span> Cancelled </span></p>
                                                                @elseif ($property->rentedProperty && $property->rentedProperty->status == 'Approved')
                                                                    <p class="header-panel-stat approved"><span> Approved </span></p>
                                                                @elseif ($property->rentedProperty && $property->rentedProperty->status == 'Checked Out')
                                                                    <p class="header-panel-stat bluish"><span> Checked Out </span></p>
                                                                @endif
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <section>
                                                <div class="is-header-req mb-20px">
                                                    <h2 class="mobile-panel-title">
                                                        <img src="{!! asset('Images/Original/Icons/locationNavy.svg') !!}" alt="hagtag" class="badges-icons-hagtag">
                                                        <span>Address</span>
                                                    </h2>
                                                </div>
                                                <div class="is-header-content-req mb-20px">
                                                    <div>
                                                        <div class="property-address-card">
                                                            <button type="button" class="address-btns">
                                                                <div class="avatar-home-icons"></div>
                                                                <span> {!! $property->building->address !!} </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="is-header-content-req mb-1">
                                                    <h4 class="desc-title-head">Description</h4>
                                                    <div>
                                                        <p class="description title-head">
                                                            @php
                                                                if($property->type == 'Rent'){
                                                                    $description = $property->description;
                                                                } elseif ($property->type == 'Sell') {
                                                                    $description = $property->building->description;
                                                                }
                                                            @endphp
                                                            @if(strlen($description) > 100)
                                                                {!! substr($description, 0, 100) !!}...
                                                            @else
                                                                {!! $description !!}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="is-header-content-req">
                                                    <h4 class="desc-title-head">Price</h4>
                                                    <div>
                                                        <p class="description title-head">Rs @if($property->type == 'Rent'){!! $property->monthly_house_rent !!}@elseif($property->type == 'Sell'){!! $property->price !!}@endif</p>
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
                                                <img src="{!! asset('Images/Original/Request/stat.svg') !!}" alt="left-back-btn" class="left-back-btn">
                                            </div>
                                        </div>
                                        <h2 class="mobile-panel-title">Availability and Charges</h2>
                                        <span class="mobile-panel-sub-title">(Details)</span>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-inner-wrap">
                                            <div class="header-panel-inner-wrapper">
                                                <ul class="info-grid-list">
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Area :</p>
                                                        <p class="info-grid-items">{!! $property->area !!} Sq.ft</p>
                                                    </li>
                                                    @if($property->type == 'Rent')
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Bed :</p>
                                                        <p class="info-grid-items">28</p>
                                                    </li>
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Floor :</p>
                                                        <p class="info-grid-items">5</p>
                                                    </li>
                                                    @endif
                                                </ul>
                                                <ul class="info-grid-list">
                                                    @if($property->type == 'Rent')
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Electric Charge :</p>
                                                        <p class="info-grid-items">Rs {!! $property->electric_charge !!}</p>
                                                    </li>
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Water Charge :</p>
                                                        <p class="info-grid-items">Rs {!! $property->water_charge !!}</p>
                                                    </li>
                                                    <li class="info-grid-list-item">
                                                        <p style="font-weight: 600;" class="info-grid-items">Garbage Charge :</p>
                                                        <p class="info-grid-items">Rs {!! $property->garbage_charge !!}</p>
                                                    </li>
                                                    @endif
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
                                        <span class="mobile-panel-sub-title">({!! $imageCount !!} records)</span>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-inner-wrap">
                                            <div class="add-img-container">
                                                @forelse ($combinedImages as $image)
                                                    <img src="{!! asset($image) !!}" class="img-fluid" style="max-width: 150px;">
                                                @empty
                                                    <!-- if there is no image -->
                                                    <div class="text-center">
                                                        <p class="text-center">No Attachments Yet</p>
                                                        <p class="text-center">When files are added, they will appear here.</p>
                                                    </div>
                                                <!--End if there is no image -->
                                                @endforelse
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
                                                <img src="{!! asset('Images/Original/Request/useroutlet.svg') !!}" alt="left-back-btn" class="left-back-btn">
                                            </div>
                                        </div>
                                        <h2 class="mobile-panel-title">Landlord Information</h2>
                                    </header>
                                    <div class="header-panel-body">
                                        <div class="header-panel-inner-wrap">
                                            <div class="header-panel-inner-wrapper">
                                                        <p style="font-weight: 600;" class="info-grid-items">Landlord Name :</p>
                                                        <p class="info-grid-items">{!! $property->landlord->first_name !!} {!! $property->landlord->last_name !!}</p>

                                                        <p style="font-weight: 600;" class="info-grid-items">Contact :</p>
                                                        <p class="info-grid-items">{!! $property->landlord->phone_number !!}</p>
   
                                                        <p style="font-weight: 600;" class="info-grid-items">Email :</p>
                                                        <p class="info-grid-items">{!! $property->landlord->email !!}</p>

                                                            <p style="font-weight: 600;" class="info-grid-items">Lease Agreement :</p>
                                                            <p class="info-grid-items d-flex">
                                                                <a class="text-hover" href="{!! route('tenant.forum.detail', $property->forum->slug) !!}">{!! $property->forum->heading !!}</a>
                                                                <a href="{!! route('forum.generatePDF', $property->forum->slug) !!}" class="view-more-link d-flex">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"></path></svg>
                                                                </a>
                                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="req-footers">
                                <span class="color-navy">Created by 
                                    {!! $property->rentedProperty->tenant->first_name !!} {!! $property->rentedProperty->tenant->last_name !!}
                                    on
                                </span>
                                <span class="color-navy">{!! $rented_property->created_at->toDateString() !!} ({!! $rented_property->created_at->diffForHumans() !!})</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End View From here --}}


    <x-landlords.footer />                
</x-users.main.app-layout>