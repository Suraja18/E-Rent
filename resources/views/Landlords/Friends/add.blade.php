<x-users.main.app-layout>
    <x-slot name="head">
        - Friends
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Add Profile</x-slot>
    </x-landlords.banners>

    @php
        $friendsa = App\Models\User::whereIn('roles', ['1', '2'])
            ->where('id', '!=', auth()->id())
            ->whereExists(function ($query) {
                $query
                    ->select('user_id')
                    ->from('friends')
                    ->where('type', 'New')
                    ->where('sent_id', auth()->id())
                    ->whereRaw('users.id = friends.user_id');
            })
            ->get();
    @endphp
    <!-- Start Banners -->
    <section class="houseDetails" id="Landlords-details-focus">
        <div class="container p5">

            <div class="service-grid" role="list">
                <div class="service-grid" role="listitem">
                    <div class="housing-container">
                        <div class="housing-wrapper">
                            <div class="hero-content housing-content-center housing-detail plr-4">
                                <h2 class="text-left mb-30p">Friend Request</h2>
                            </div>
                            <div class="row" role="list">
                                @forelse ($friendsa as $friend)
                                    @php
                                        $requiredFields = [
                                            'first_name',
                                            'last_name',
                                            'phone_number',
                                            'email',
                                            'image',
                                            'address',
                                            'gender',
                                        ];
                                        $profileIncomplete = false;
                                        foreach ($requiredFields as $field) {
                                            if (empty($friend->$field)) {
                                                $profileIncomplete = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if (!$profileIncomplete)
                                        <div class="col-25 animate wow fadeInUp" data-wow-delay="0.1s" role="listitem">
                                            <div class="landlord-containers">
                                                <div class="p-r">
                                                    <img class="img-fluid" src="{!! asset($friend->image) !!}"
                                                        alt="{!! $friend->first_name !!} Image">
                                                </div>
                                                <div class="text-center landlord-wrappers">
                                                    <h5 class="heading-larger for-landlord">{!! $friend->first_name !!}
                                                        {!! $friend->last_name !!}</h5>
                                                    <p class="paragraph text-center mt-0">
                                                        @if ($friend->roles == '1')
                                                            Tenant
                                                        @else
                                                            Landlord
                                                        @endif
                                                    </p>
                                                    <button type="button"
                                                        class="confirm-request m-button btn-Primary wid100"
                                                        data-request-id="{!! $friend->friends[0]->user_id !!}">Confirm</button>
                                                    <a class="is-button-for-edit-profile wid100" style="display: none"
                                                        data-friend-id="{!! $friend->friends[0]->user_id !!}"></a>
                                                    <button type="button"
                                                        class="remove-request is-button-for-edit-profile wid100"
                                                        data-request-id="{!! $friend->friends[0]->user_id !!}">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="col-25 animate wow fadeInUp" data-wow-delay="0.1s" role="listitem">No friend Request </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-tenants.new-friends-list />

        </div>
    </section>
    <!-- End Banners -->


    <x-landlords.footer />
    <script>
        $(document).ready(function() {
            $('.confirm-request, .remove-request').on('click', function() {
                var requestId = $(this).data('request-id');
                var type = $(this).hasClass('confirm-request') ? 'Accepted' : null;
                $.ajax({
                    type: 'POST',
                    url: '{!! route('landlord.updateFriendRequest') !!}',
                    data: {
                        request_id: requestId,
                        type: type,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('.confirm-request[data-request-id="' + requestId + '"]').hide();
                        $('.remove-request[data-request-id="' + requestId + '"]').hide();
                        $('.is-button-for-edit-profile[data-friend-id="' + requestId + '"]')
                            .show().text(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating friend request:', error);
                    }
                });
            });
        });
    </script>
</x-users.main.app-layout>
