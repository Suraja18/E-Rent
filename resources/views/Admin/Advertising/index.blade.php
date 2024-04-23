<x-users.main.app-layout>
    <x-slot name="head">
        - Advertising
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Intro</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.advertising.store') }}" method="POST">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Video Title</x-slot>
                <x-slot name="value">{!! $advertising->video_title !!}</x-slot> 
            </x-common.input-text-100>    
            <x-common.input-text-100>
                <x-slot name="column">Video Description</x-slot>
                <x-slot name="value">{!! $advertising->video_description !!}</x-slot> 
            </x-common.input-text-100>   
            <div class="admin">
                <h4 class="mb-1">Display Video</h4>
                <iframe width="100%" height="480px"
                    src="{!! $advertising->video_link !!}"
                    frameborder="0" allowfullscreen
                    allow="autoplay; encrypted-media"></iframe>
                <input placeholder="Write Video Link here..." name="video_link" class="form-control" />
                @error('video_link')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>  
            <x-common.input-text-100>
                <x-slot name="column">Title</x-slot>
                <x-slot name="value">{!! $advertising->title !!}</x-slot> 
            </x-common.input-text-100>    
            <x-common.input-text-100>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $advertising->description !!}</x-slot> 
            </x-common.input-text-100>      
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />                
</x-users.main.app-layout>