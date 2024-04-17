<x-users.main.app-layout>
    <x-slot name="head">
        - About Us
    </x-slot>
    <x-tenants.navbar />

    <div class="invoice-container plr-4">
        <x-common.profiles :tenant="$tenant ?? null">
            <x-slot name="margin">
                margin-left:20%;
            </x-slot>
            <x-slot name="unfriend">{!! route('tenant.unfriend') !!}</x-slot>
            <x-slot name="addingFriend">{!! route('tenant.addingFriend') !!}</x-slot>
        </x-common.profiles>
    </div>

    <x-tenants.new-friends-list>
        <x-slot name="route"> {!! route('tenant.viewFriend') !!}</x-slot>
    </x-tenants.new-friends-list>

    <x-tenants.footer />

</x-users.main.app-layout>