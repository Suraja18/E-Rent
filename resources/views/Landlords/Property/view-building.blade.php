<x-users.main.app-layout>
    <x-slot name="head">
        - View Building
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('building.index') }}" class="banner-link-for-header"> Building</a>
            </li>
        </x-slot>
        <x-slot name="name">View Building</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('building.index') }}" method="GET">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Name</x-slot>
                <x-slot name="value">{!! $building->name !!}</x-slot>
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $building->description !!}</x-slot>
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.ck-imageless>
            <x-common.input-image-25>
                <x-slot name="image1">{!! asset($building->image_1) !!}</x-slot>
                <x-slot name="image2">{!! asset($building->image_2) !!}</x-slot>
                <x-slot name="image3">{!! asset($building->image_3) !!}</x-slot>
                <x-slot name="image4">{!! asset($building->image_4) !!}</x-slot>
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-image-25>
            <x-common.input-text-50>
                <x-slot name="column1">No of Floors</x-slot>
                <x-slot name="number1">Number</x-slot>
                <x-slot name="value1">{!! $building->no_of_floors !!}</x-slot>
                <x-slot name="column2">Room Per Floor</x-slot>
                <x-slot name="number2">Number</x-slot>
                <x-slot name="value2">{!! $building->room_per_floor !!}</x-slot>
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-50>
            <x-common.input-text-100>
                <x-slot name="column">Address</x-slot>
                <x-slot name="value">{!! $building->address !!}</x-slot>
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Google Maps Link</x-slot>
                <x-slot name="valuemap">{!! $building->google_maps_link !!}</x-slot>
                <x-slot name="value">{!! $building->google_maps_link !!}</x-slot>
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <div class="text-center">
                <input type="submit" value="Back" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />                
</x-users.main.app-layout>