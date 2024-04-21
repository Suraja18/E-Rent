<x-users.main.app-layout>
    <x-slot name="head">
        - About
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">History</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.history.store') }}" method="POST">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
                <x-slot name="value">{!! $history->heading !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $history->description !!}</x-slot>
            </x-common.ck-imageless>
            <div class="admin">
                <h4 class="mb-1">Display Images</h4>
                <div class="add-img-container">
                    <div class="add-flex-2">
                        <x-common.input-file-flex>
                            <x-slot name="image">Image 1</x-slot>
                            @if(isset($historyImage->image))
                                <x-slot name="value2">{!! asset($historyImage->image) !!}</x-slot>
                            @endif
                        </x-common.input-file-flex>
                    </div>
                </div>
                @if(!isset($type))
                    <h6 class="mb-1 mt-1">Note: Please Insert Transparent Background Image</h6>
                @endif
            </div>               
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />                
</x-users.main.app-layout>

