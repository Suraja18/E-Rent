<x-users.main.app-layout>
    <x-slot name="head">
        - User Roles
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('press.index') }}" class="banner-link-for-header"> User Roles</a>
            </li>
        </x-slot>
        <x-slot name="name">View</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('roles.index') }}" method="GET">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">User Roles</x-slot>
                <x-slot name="value">{!! $role->user_roles !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Roles</x-slot>
                <x-slot name="value">{!! $role->roles !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $role->description !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.ck-imageless>
            <x-common.input-image-100>
                <x-slot name="type">{!! $type !!}</x-slot>
                <x-slot name="image1">{!! asset($role->image) !!}</x-slot>
            </x-common.input-image-100>
            <div class="admin">
                <div class="add-img-container">
                    <div class="add-flex-1">
                        <x-common.input-file-flex>
                            <x-slot name="image">Image 2</x-slot>
                            <x-slot name="value2">{!! asset($role->sub_image) !!}</x-slot>
                            <x-slot name="type">{!! $type !!}</x-slot>
                        </x-common.input-file-flex>
                    </div>
                </div>
            </div>
            <x-common.input-text-100>
                <x-slot name="column">Processes that Pay Off</x-slot>
                <x-slot name="value">{!! $role->processes_that_pay_off !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <div class="text-center">
                <input type="submit" value="Back to Table" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>