<x-users.main.app-layout>
    <x-slot name="head">
        - Press & Media
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('press.index') }}" class="banner-link-for-header"> Press & Media</a>
            </li>
        </x-slot>
        <x-slot name="name">{!! $press->heading !!}</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('press.index') }}" method="GET">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
                <x-slot name="value">{!! $press->heading !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $press->description !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.ck-imageless>
            <x-common.input-image-100>
                <x-slot name="type">{!! $type !!}</x-slot>
                <x-slot name="image1">{!! asset($press->image_1) !!}</x-slot>
            </x-common.input-image-100>
            <x-common.input-text-100>
                <x-slot name="column">Type</x-slot>
                <x-slot name="value">{!! $press->type !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <div class="text-center">
                <input type="submit" value="Back" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>