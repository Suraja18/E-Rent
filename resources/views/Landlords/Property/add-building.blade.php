<x-users.main.app-layout>
    <x-slot name="head">
        - Add Building
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('building.index') }}" class="banner-link-for-header"> Building</a>
            </li>
        </x-slot>
        <x-slot name="name">Add Building</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form action="{!! route('building.store') !!}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Name</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
            </x-common.ck-imageless>
            <x-common.input-image-25 />
            <x-common.input-text-50>
                <x-slot name="column1">No of Floors</x-slot>
                <x-slot name="column2">Address</x-slot>
            </x-common.input-text-50>
            <div class="text-center">
                <button type="submit" class="is-button-for-edit-profile is-hovers">Add</button>
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />                
</x-users.main.app-layout>