@php
if(Route::currentRouteName() == 'tenant.dashboard' || Route::currentRouteName() == 'landlord.view.friends' || Route::currentRouteName() == 'tenant.view.friends'){
    $friends = App\Models\User::whereIn('roles', ['1', '2'])
                                ->where('id', '!=', auth()->id())
                                ->whereNotExists(function ($query) {
                                    $query->select('id')
                                          ->from('friends')
                                          ->whereRaw('friends.user_id = users.id')
                                          ->where('friends.sent_id', auth()->id());
                                })
                                ->whereNotExists(function ($query) {
                                    $query->select('id')
                                          ->from('friends')
                                          ->whereRaw('friends.sent_id = users.id')
                                          ->where('friends.user_id', auth()->id());
                                })
                                ->latest()->take(4)->get();
}else{
    $friends = App\Models\User::whereIn('roles', ['1', '2'])
                                ->where('id', '!=', auth()->id())
                                ->whereNotExists(function ($query) {
                                    $query->select('id')
                                          ->from('friends')
                                          ->whereRaw('friends.user_id = users.id')
                                          ->where('friends.sent_id', auth()->id());
                                })
                                ->whereNotExists(function ($query) {
                                    $query->select('id')
                                          ->from('friends')
                                          ->whereRaw('friends.sent_id = users.id')
                                          ->where('friends.user_id', auth()->id());
                                })
                                ->latest()->get();
}

@endphp
<div class="service-grid" role="list" id="serGrid">
    <div class="service-grid" role="listitem">
        <div class="housing-container">
            <div class="housing-wrapper">
                <div class="hero-content housing-content-center housing-detail plr-4">
                    <h2 class="text-left mb-30p">People You May Know</h2>
                </div>
                <div class="row" role="list">
                    @forelse ($friends as $friend)
                        @php
                            $requiredFields = ['first_name', 'last_name', 'phone_number', 'email', 'image', 'address', 'gender'];
                            $profileIncomplete = false;
                            foreach ($requiredFields as $field) {
                                if (empty($friend->$field)) {
                                    $profileIncomplete = true;
                                    break;
                                }
                            }
                        @endphp
                        @if(!$profileIncomplete)
                            <div class="col-25 animate wow fadeInUp" data-wow-delay="0.1s" role="listitem">
                                <div class="landlord-containers">
                                    <div class="p-r">
                                        <img class="img-fluid" src="{!! asset($friend->image) !!}" alt="{!! $friend->first_name !!} Image">
                                    </div>
                                    <div class="text-center landlord-wrappers">
                                        <h5 class="heading-larger for-landlord">
                                            <form action="{!! $route !!}" method="POST">
                                                @csrf
                                                <input type="hidden" name="tenantID" value="{!! $friend->id !!}" />
                                                <input class="b-e-0" type="submit" value="{!! $friend->first_name !!} {!! $friend->last_name !!}">
                                            </form> 
                                            
                                        </h5>
                                        <p class="paragraph text-center mt-0">@if($friend->roles == '1') Tenant @else Landlord @endif</p>
                                        <button type="button" class="add-friend m-button btn-Primary wid100" data-friend-id="{!! $friend->id !!}">Add Friend</button>
                                        <a class="is-button-for-edit-profile wid100" style="display: none" data-friend-id="{!! $friend->id !!}">Friend Request Sent</a>
                                    </div>
                                </div>
                            </div> 
                        @endif
                    @empty
                        <div class="col-25 animate wow fadeInUp" data-wow-delay="0.1s" role="listitem">No Other People </div>
                    @endforelse
                </div>     
            </div>
        </div>
    </div>
</div>
