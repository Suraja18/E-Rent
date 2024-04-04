<x-users.main.app-layout>
    <x-slot name="head">
        - Edit Aggrement
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('forum.index') }}" class="banner-link-for-header"> Landlord Forum</a>
            </li>
        </x-slot>
        <x-slot name="name">Edit Aggrement</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('forum.update', $forum) }}" method="POST">
            @method('PUT')
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
                <x-slot name="value">{!! $forum->heading !!}</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $forum->description !!}</x-slot>
            </x-common.ck-imageless>
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>