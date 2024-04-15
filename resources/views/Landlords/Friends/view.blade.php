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
            ->where(function ($query) {
                $query->whereExists(function ($subQuery) {
                    $subQuery->from('friends')
                        ->where('type', 'Accepted')
                        ->whereRaw('users.id = friends.user_id')
                        ->where('friends.sent_id', auth()->id());
                })
                ->orWhereExists(function ($subQuery) {
                    $subQuery->from('friends')
                        ->where('type', 'Accepted')
                        ->whereRaw('users.id = friends.sent_id')
                        ->where('friends.user_id', auth()->id());
                });
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
                                <h2 class="text-left mb-30p">Friends</h2>
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
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="col-25 animate wow fadeInUp" data-wow-delay="0.1s" role="listitem">No Friends </div>
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
</x-users.main.app-layout>
