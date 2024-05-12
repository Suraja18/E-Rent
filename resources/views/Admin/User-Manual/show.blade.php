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
        <x-slot name="name">Show</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('manual.index') }}" method="GET">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Title</x-slot>
                <x-slot name="value">{!! $manual->title !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $manual->description !!}</x-slot>
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.ck-imageless>
            <x-common.input-text-100>
                <x-slot name="column">Video For</x-slot>
                <x-slot name="value">
                    @if(isset($manual->roleUser) && $manual->roleUser->id == 3)
                        Tenant & Landlord
                    @elseif(isset($manual->roleUser) && isset($manual->roleUser->user_roles))
                        {!! $manual->roleUser->user_roles !!}
                    @else
                        All users
                    @endif
                </x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <div class="admin">
                <h4 class="mb-1">Video</h4>
                <iframe width="100%" height="480px"
                    src="{!! $manual->link !!}"
                    frameborder="0" allowfullscreen
                    allow="autoplay; encrypted-media"></iframe>
            </div>
            <div class="text-center">
                <input type="submit" value="Back To Table" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>
    <x-landlords.footer />  
</x-users.main.app-layout>