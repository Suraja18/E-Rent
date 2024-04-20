<x-users.main.app-layout>
    <x-slot name="head">
        - About
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Infinity Description</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.infinity.store') }}" method="POST">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
                <x-slot name="value">{!! $intro->heading !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $intro->description !!}</x-slot>
            </x-common.ck-imageless>            
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />                
</x-users.main.app-layout>