<x-users.main.app-layout>
    <x-slot name="head">
        - User Roles
    </x-slot>
    <x-users.navbar />
    <section class="clientSays bg-light">
        <div class="container pt-7b">
            <div class="hero-content mb-3 text-center">
                <div class="text-navys">Roles</div>
                <h1>Because we know property people</h1>
                <p class="intro-paragraph">Discover the power of efficient property management with e-rent. Tailored to meet the demands of property professionals, our roles are designed to streamline operations, enhance tenant relations, and optimize your property portfolio for maximum productivity and profitability."</p>
            </div>
            <div class="roles-grid pt-4">
                <div>
                    @php
                        $roles = App\Models\userRoles::latest()->get();
                        $color = ['ffd4c2', 'b3e9eb', 'c9def6'];
                    @endphp
                    <div class="roles-three-grid" role="item">
                        @foreach($roles as $index => $role)
                            <div class="roles-content-card" role="listitem">
                                <a href="{!! route('user.role.detail', $role->slug) !!}" class="roles-content-card-links inline-block">
                                    <div class="landing-card-cover">
                                        <img loading="eager" style="background-color:#{{ $color[$index % 3] }}" alt="{{ $role->user_roles }}" src="{!! asset($role->image) !!}" sizes="(max-width: 479px) 82vw, (max-width: 767px) 79vw, (max-width: 1279px) 38vw, (max-width: 1439px) 25vw, (max-width: 1919px) 24vw, 353.34375px" class="landing-card-img">
                                    </div>
                                    <div class="hero-content mt1-5 pt2-5b pl1-5r">
                                        <h2 class="heading-med">{!! $role->user_roles !!}</h2>
                                        <div class="text-sub-headers">{!! $role->roles !!}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-users.showing-ads />
    <x-users.footer />

</x-users.main.app-layout>