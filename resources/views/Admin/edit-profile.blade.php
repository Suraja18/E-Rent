<x-users.main.app-layout>
    <x-slot name="head">
        - Account
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Edit Profile</x-slot>
    </x-admin.banners>
                           
    <x-common.edit-profile>
        <x-slot name="isAdmin">isAdmin</x-slot>
        <x-slot name="route">{!! route('admin.account') !!}</x-slot>
        <x-slot name="first_name">{!! $user->first_name !!}</x-slot>
        <x-slot name="last_name">{!! $user->last_name !!}</x-slot>
        <x-slot name="phone_number">{!! $user->phone_number !!}</x-slot>
        <x-slot name="address">{!! $user->address !!}</x-slot>
        <x-slot name="gender">{!! $user->gender !!}</x-slot>
        @if($user->image)
            <x-slot name="image">{!! $user->image !!}</x-slot>
        @endif
    </x-common.edit-profile>


    <x-landlords.footer />                
</x-users.main.app-layout>