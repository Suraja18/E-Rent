<x-users.main.app-layout>
    <x-slot name="head">
        - Elements
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Elements</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.rates.store') }}" method="POST">
            @csrf
            @foreach ($rates as $index => $rate)
                <div class="admin">
                    <h4 class="mb-1">Display Images</h4>
                    <div class="add-img-container">
                        <div class="add-flex-2">
                            <x-common.input-file-flex>
                                <x-slot name="image">Image {!! $index + 1 !!}</x-slot>
                                @if(isset($rate->images))
                                    <x-slot name="value2">{!! asset($rate->images) !!}</x-slot>
                                @endif
                            </x-common.input-file-flex>
                        </div>
                    </div>
                    @if(!isset($type))
                        <h6 class="mb-1 mt-1">Note: Please Insert Transparent Background Image</h6>
                    @endif
                </div>  
                <x-common.input-text-100>
                    <x-slot name="column">Title {!! $index + 1 !!}</x-slot>
                    <x-slot name="value">{!! $rate->title !!}</x-slot> 
                </x-common.input-text-100>
                <x-common.input-text-100>
                    <x-slot name="column">Description {!! $index + 1 !!}</x-slot>
                    <x-slot name="value">{!! $rate->paragraph !!}</x-slot> 
                </x-common.input-text-100>
            @endforeach           
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />                
</x-users.main.app-layout>

