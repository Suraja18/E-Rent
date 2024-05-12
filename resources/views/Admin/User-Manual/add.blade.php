<x-users.main.app-layout>
    <x-slot name="head">
        - User Manual
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('manual.index') }}" class="banner-link-for-header"> User Manual</a>
            </li>
        </x-slot>
        <x-slot name="name">Add</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('manual.store') }}" method="POST">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Title</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
            </x-common.ck-imageless>
            <div class="admin">
                <h4 class="mb-1">Video For</h4>
                <select class="form-control" name="role_id" id="role_id">
                    <option value="">All User</option>
                    <option value="1">Tenant</option>
                    <option value="2">Landlord</option>
                    <option value="3">Tenant & Landlord</option>
                </select>
                @error("role_id")
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <x-common.input-text-100>
                <x-slot name="column">Video Embed Links</x-slot>
            </x-common.input-text-100>
            <div class="text-center">
                <input type="submit" value="Add" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>