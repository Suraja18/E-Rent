@php
    $tenantId = $tenant->id;
    $userId = auth()->id();
    $count = App\Models\Friends::where(function($query) use ($tenantId) {
            $query->where('user_id', $tenantId)
                  ->orWhere('sent_id', $tenantId);
        })
        ->where('type', 'Accepted')
        ->count();
    $isFriend = App\Models\Friends::where(function ($query) use ($userId, $tenantId) {
            $query->where('user_id', $userId)
                    ->where('sent_id', $tenantId)
                    ->orWhere('user_id', $tenantId)
                    ->where('sent_id', $userId);
        })
        ->where('type', 'Accepted')
        ->exists();
    $isNewFriend = App\Models\Friends::where(function ($query) use ($userId, $tenantId) {
            $query->where('user_id', $userId)
                    ->where('sent_id', $tenantId)
                    ->orWhere('user_id', $tenantId)
                    ->where('sent_id', $userId);
        })
        ->where('type', 'New')
        ->exists();
@endphp
{{-- <div class="invoice-container plr-4"> --}}
    <div class="is-header-all-wrappers">
        <div class="is-header-all-wrappers">
            <div>
                <div class="flex-cl-1">
                    <div class="flex-cl-1 account-sett" style=" width: 100%;">
                        <div class="flex-cl-1" style="padding:20px">
                            <div>
                                <div class="pr-container">
                                    <div class="pr-wrapper">
                                        <div>
                                            <div class="pr-div">
                                                <div class="pr-profile">
                                                    <div class="pr-profile-container">
                                                        <img height="168" width="168" src="{!! asset($tenant->image) !!}" class="pr-profile-container" alt="">
                                                    </div>
                                                </div>
                                                <div class="pr-info" style=" @if(isset($margin)) {!! $margin !!} @endif ">
                                                    <div class="pr-info-container">
                                                        <div class="pr-info-container body">
                                                            <div style="margin: .5rem 0">
                                                                <span class="pr-header">
                                                                    <h1>{!! $tenant->first_name !!} {!! $tenant->last_name !!}</h1>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="pr-info-container body">
                                                            <span class="pr-friends">
                                                                <h1 class="pr-friends">{!! $count !!} friends</h1>
                                                            </span>
                                                        </div>
                                                        <div class="pr-info-container body">
                                                            <div style="margin: .5rem 0">
                                                                <span class="pr-header">
                                                                    <h3>
                                                                        @if($tenant->roles == 1)
                                                                            {!! "Tenant" !!}
                                                                        @elseif($tenant->roles == 2)
                                                                            {!! "Landlord" !!}
                                                                        @endif
                                                                    </h3>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pr-buttons d-flex">
                                                        @if($isFriend)
                                                            <div class="pr-button-container">
                                                                <a href="#" class="pr-button-wrapper">
                                                                    <div class="pr-button-bg active">
                                                                        <div class="pr-button-flex">
                                                                            <div class="pr-button-icon">
                                                                                <img class="plus-image" src="{!! asset('Images/Original/friendsuccess.png') !!}" height="16" width="16">
                                                                            </div>
                                                                            <div class="pr-button-icon">
                                                                                <span class="icon-text">Friends</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="pr-button-container">
                                                                <a class="pr-button-wrapper" id="svgButton">
                                                                    <div class="pr-button-bg bor">
                                                                         <div class="pr-button-flex p-r">
                                                                            <div class="pr-button-icon">
                                                                                <svg viewBox="0 0 24 24" width="16" height="16" fill="#3d3975"><circle cx="12" cy="12" r="2.5"></circle><circle cx="19.5" cy="12" r="2.5"></circle><circle cx="4.5" cy="12" r="2.5"></circle></svg>
                                                                            </div>
                                                                            <div class="pr-unfriend-container" id="PRUnfriend">
                                                                                <form action="{!! $unfriend !!}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="tenantID" value="{!! $tenant->id !!}" />
                                                                                    <button type="submit" class="pr-button-bg pr-button-flex">
                                                                                        <div class="pr-button-icon">
                                                                                            <img class="plus-image" src="{!! asset('Images/Original/unfriend-image.png') !!}" height="16" width="16">
                                                                                        </div>
                                                                                        <div class="pr-button-icon">
                                                                                            <span class="icon-text">Unfriend</span>
                                                                                        </div>
                                                                                    </button>
                                                                                </form>
                                                                             </div> 
                                                                         </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @elseif ($isNewFriend)
                                                            <div class="pr-button-container">
                                                                <a class="pr-button-wrapper">
                                                                    <div class="pr-button-bg active">
                                                                        <div class="pr-button-flex">
                                                                            <div class="pr-button-icon">
                                                                                <img class="plus-image" src="{!! asset('Images/Original/tick-image.png') !!}" height="16" width="16">
                                                                            </div>
                                                                            <div class="pr-button-icon">
                                                                                <span class="icon-text">Friend Request Sent</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="pr-button-container">
                                                                <form action="{!! $addingFriend !!}" method="POST" class="pr-button-wrapper">
                                                                    @csrf
                                                                    <input type="hidden" name="tenantID" value="{!! $tenant->id !!}" />
                                                                    <button type="submit" class="pr-button-bg">
                                                                        <div class="pr-button-flex">
                                                                            <div class="pr-button-icon">
                                                                                <img class="plus-image" src="{!! asset('Images/Original/plusimage.png') !!}" height="16" width="16">
                                                                            </div>
                                                                            <div class="pr-button-icon">
                                                                                <span class="icon-text">Add Friends</span>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="pr-wrapper-body">
                                            <div class="d-flex p-r" style="flex-direction: column">
                                                <div class="pr-wrapper-container">
                                                    <h2>Bio</h2>
                                                </div>
                                                <div class="d-576" style="margin-bottom: 8px;">
                                                    <h4 style="min-width: 150px">Phone Number: </h4>
                                                    <span class="pr-content">{!! $tenant->phone_number !!}</span>
                                                </div>
                                                <div class="d-576" style="margin-bottom: 8px;">
                                                    <h4 style="min-width: 150px">Email: </h4>
                                                    <span class="pr-content">{!! $tenant->email !!}</span>
                                                </div>
                                                <div class="d-576" style="margin-bottom: 8px;">
                                                    <h4 style="min-width: 150px">Address: </h4>
                                                    <span class="pr-content">{!! $tenant->address !!}</span>
                                                </div>
                                                <div class="d-576" style="margin-bottom: 8px;">
                                                    <h4 style="min-width: 150px">Gender: </h4>
                                                    <span class="pr-content">{!! $tenant->gender !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
<script>
    document.getElementById('svgButton').addEventListener('click', function() {
        var PRUnfriend = document.getElementById('PRUnfriend');
        PRUnfriend.classList.toggle('active');
    });
</script>