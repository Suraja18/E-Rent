@php
    $roles = App\Models\userRoles::latest()->get();
@endphp
<x-users.main.app-layout>
    <x-slot name="head">
        - User Roles
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('roles-desc.index') }}" class="banner-link-for-header"> User Roles</a>
            </li>
        </x-slot>
        <x-slot name="name">Show</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('roles-desc.index') }}" method="GET">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">User Roles</x-slot>
                <x-slot name="value">{!! $role->userRole->user_roles !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Title</x-slot>
                <x-slot name="value">{!! $role->title !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $role->description !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <div class="text-center">
                <input type="submit" value="Back to Table" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>