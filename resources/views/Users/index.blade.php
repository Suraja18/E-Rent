<x-users.main.app-layout>
        <x-users.navbar />

        <x-users.hero-banner />

        <x-users.website-rate />

        <x-users.elements />

        <x-users.service />

        <x-users.advertising />

        <x-users.roles-detail-upper>
                <x-slot name="indexPage"><h1 class="slider-container p">Because we know property people</h1></x-slot>   
                <x-slot name="indexPageBtn">
                        <a href="{!! route('user.user-role') !!}" class="btn btnPrimary">Show More Roles</a>
                </x-slot>   
        </x-users.roles-detail-upper>

        @php
                $press = App\Models\PressMedia::latest()->first();
        @endphp
        <x-users.clients-say :press="$press ?? null" />

        <x-users.faqs />

        <x-users.showing-ads />

        <x-users.footer />
</x-users.main.app-layout>
        