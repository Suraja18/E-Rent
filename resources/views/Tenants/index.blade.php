<x-users.main.app-layout>
    <x-slot name="head">
        - Tenants
    </x-slot>
    <x-tenants.navbar />

    <x-tenants.hero-banner />

    <x-tenants.property-search />

    <x-tenants.all-property-types />

    <x-tenants.new-friends-list>
        <x-slot name="route"> {!! route('tenant.viewFriend') !!}</x-slot>
    </x-tenants.new-friends-list>

    <x-tenants.property-detail />

    <x-tenants.universal-landlord-forum />

    <x-tenants.all-landlord />

    <x-users.showing-ads />

    <x-common.app-for-user />

    <x-tenants.footer />
</x-users.main.app-layout>