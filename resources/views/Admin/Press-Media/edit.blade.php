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
        <x-slot name="name">Add</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('press.update', $press) }}" method="POST">
            @csrf
            @method('PUT')
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
                <x-slot name="value">{!! $press->heading !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $press->description !!}</x-slot> 
            </x-common.ck-imageless>
            <x-common.input-image-100>
                <x-slot name="nothing">Nothing</x-slot>
                <x-slot name="image1">{!! asset($press->image_1) !!}</x-slot>
            </x-common.input-image-100>
            <div class="admin">
                <h6 class="mb-1">Type</h6>
                <select class="form-control"  name="type" required>
                    <option value="{!! $press->type !!}">{!! $press->type !!}</option>
                    <option value="Press">Press</option>
                    <option value="Media">Media</option>
                    <option value="News">News</option>
                </select>
                @error('type')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>