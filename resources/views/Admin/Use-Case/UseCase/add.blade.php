@php
    $roles = App\Models\userRoles::latest()->get();
@endphp
<x-users.main.app-layout>
    <x-slot name="head">
        - Use Case
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('use-case.index') }}" class="banner-link-for-header"> Use Case</a>
            </li>
        </x-slot>
        <x-slot name="name">Add</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('use-case.store') }}" method="POST">
            @csrf
            <x-common.input-select-100>
                <x-slot name="column">User Roles</x-slot>
                @foreach ($roles as $role)
                    <option value="{!! $role->id !!}">{!! $role->user_roles !!}</option>
                @endforeach
            </x-common.input-select-100>
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
            </x-common.ck-imageless>
            <div class="text-center">
                <input type="submit" value="Add" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>