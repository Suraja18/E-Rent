@php
    if(Route::currentRouteName() == 'tenant.dashboard'){
        $landlords = App\Models\User::where('roles', '2')->latest()->take(4)->get();
    } else {
        $landlords = App\Models\User::where('roles', '2')->latest()->get();
    }
@endphp
<!-- Start Property Owner Details -->
<section class="houseDetails" id="Landlords-details-focus">
    <div class="container p5">
        <div class="service-grid" role="list">
            <div class="service-grid" role="listitem">
                <div class="housing-container">
                    <div class="housing-wrapper">
                        <div class="hero-content housing-content-center housing-detail plr-4">
                            <h2 class="text-center">The Best of Multifamily: Meet E-Rent Landlord Advisory Board</h2>
                            <div class="hero-content text-left">
                                <p class="paragraph text-center">Introducing our Landlords Advisory Board: comprised of the brightest minds in multifamily, we are exploring the next frontier in PropTech to deliver the future of property operations.</p>
                            </div>
                        </div>
                        <div class="row" role="list">
                            @foreach($landlords as $landlord)
                            @php
                                $requiredFields = ['first_name', 'last_name', 'phone_number', 'email', 'image', 'address', 'gender'];
                                $profileIncomplete = false;
                                foreach ($requiredFields as $field) {
                                    if (empty($landlord->$field)) {
                                        $profileIncomplete = true;
                                        break;
                                    }
                                }
                            @endphp
                    
                            @if (!$profileIncomplete)
                            <div class="col-25 animate wow fadeInUp" data-wow-delay="0.1s" role="listitem">
                                <div class="landlord-containers">
                                    <div class="p-r">
                                        <img class="img-fluid" src="{!! asset($landlord->image) !!}" alt="{!! $landlord->first_name !!} ">
                                    </div>
                                    <div class="text-center landlord-wrappers">
                                        <h5 class="heading-larger for-landlord">
                                            <form action="{!! route('tenant.viewFriend') !!}" method="POST">
                                                @csrf
                                                <input type="hidden" name="tenantID" value="{!! $landlord->id !!}" />
                                                <input class="b-e-0" type="submit" value="{!! $landlord->first_name !!} {!! $landlord->last_name !!}">
                                            </form>
                                        </h5>
                                        <p class="paragraph text-center mt-0">Landlord</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @if(Route::currentRouteName() == 'tenant.dashboard')
                            <div class="text-center">
                                <a href="{!! route('tenant.landlord') !!}" class="btn btnPrimary">Show More Landlords</a>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Property Owner Details -->