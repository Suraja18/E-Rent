<x-users.main.app-layout>
    <x-slot name="head">
        - Banners
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Banner</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.banners.store') }}" method="POST">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">User Heading</x-slot>
                <x-slot name="value">{!! $banner->user_head !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">User Description</x-slot>
                <x-slot name="value">{!! $banner->user_desc !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Tenant Heading</x-slot>
                <x-slot name="value">{!! $banner->tenant_head !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Tenant Description</x-slot>
                <x-slot name="value">{!! $banner->tenant_desc !!}</x-slot> 
            </x-common.input-text-100>
            <div class="admin">
                <h4 class="mb-1">Display Images</h4>
                <div class="add-img-container">
                    <div class="add-flex-4">
                        <x-common.input-file-flex>
                            <x-slot name="image">Image 1</x-slot>
                            @if(isset($banner->image_1))
                                <x-slot name="value2">{!! asset($banner->image_1) !!}</x-slot>
                            @endif
                        </x-common.input-file-flex>
                    </div>
                    <div class="add-flex-4">
                        <x-common.input-file-flex>
                            <x-slot name="image">Image 2</x-slot>
                            @if(isset($banner->image_2))
                                <x-slot name="value2">{!! asset($banner->image_2) !!}</x-slot>
                            @endif
                        </x-common.input-file-flex>
                    </div>
                    <div class="add-flex-4">
                        <x-common.input-file-flex>
                            <x-slot name="image">Image 3</x-slot>
                            @if(isset($banner->image_3))
                                <x-slot name="value2">{!! asset($banner->image_3) !!}</x-slot>
                            @endif
                        </x-common.input-file-flex>
                    </div>
                    <div class="add-flex-4">
                        <x-common.input-file-flex>
                            <x-slot name="image">Image 4</x-slot>
                            @if(isset($banner->image_4))
                                <x-slot name="value2">{!! asset($banner->image_4) !!}</x-slot>
                            @endif
                            <x-slot name="type2">empty</x-slot>
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