<x-users.main.app-layout>
    <x-slot name="head"> 
        - Friends
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Friends</x-slot>
    </x-landlords.banners>

    <x-common.profiles :tenant="$tenant ?? null">
        <x-slot name="margin">
            margin-left:20%;
        </x-slot>
        <x-slot name="unfriend">{!! route('landlord.unfriend') !!}</x-slot>
        <x-slot name="addingFriend">{!! route('landlord.addingFriend') !!}</x-slot>
    </x-common.profiles>

    <x-tenants.new-friends-list>
        <x-slot name="route"> {!! route('landlord.viewFriend') !!}</x-slot>
    </x-tenants.new-friends-list>


    <x-landlords.footer />

</x-users.main.app-layout>
