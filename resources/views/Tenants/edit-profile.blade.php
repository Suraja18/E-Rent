<x-users.main.app-layout>
    <x-slot name="head">
        - Accounts
    </x-slot>
    <x-tenants.navbar />
    
     <!-- Start Banners -->
     <div class="is-tenant-banners">
        <div class="is-header-all-container">
            <div class="pt-20p hide">
                <ul class="banner-header-links">
                    <li class="banner-header-name">
                        <a href="index.html" class="banner-link-for-header">Home</a>
                    </li>
                    <li class="banner-header-name">
                        /<span class="banner-link-for-header for-normal">Profile</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <x-common.edit-profile>
            <x-slot name="route">{!! route('tenant.account') !!}</x-slot>
            <x-slot name="routeFRD">{!! route('tenant.view.friends') !!}</x-slot>
            <x-slot name="first_name">{!! $user->first_name !!}</x-slot>
            <x-slot name="last_name">{!! $user->last_name !!}</x-slot>
            <x-slot name="phone_number">{!! $user->phone_number !!}</x-slot>
            <x-slot name="address">{!! $user->address !!}</x-slot>
            <x-slot name="gender">{!! $user->gender !!}</x-slot>
            <x-slot name="email">{!! $user->email !!}</x-slot>
            @if($user->image)
                <x-slot name="image">{!! $user->image !!}</x-slot>
            @endif
        </x-common.edit-profile>

    </div>
    <!-- End Banners -->

    <x-tenants.footer />
</x-users.main.app-layout>
    