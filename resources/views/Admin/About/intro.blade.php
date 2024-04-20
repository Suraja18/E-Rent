<x-users.main.app-layout>
    <x-slot name="head">
        - About
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Intro</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.intro.store') }}" method="POST">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
                <x-slot name="value">{!! $intro->heading !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $intro->description !!}</x-slot>
            </x-common.ck-imageless>
            <div class="admin">
                <h4 class="mb-1">Display Images</h4>
                <div class="add-img-container">
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($introImage as $image)
                        <div class="add-flex-4">
                            <x-common.input-file-flex>
                                <x-slot name="image">Image {!! $counter !!}</x-slot>
                                @if(isset($image->image))
                                    <x-slot name="value2">{!! asset($image->image) !!}</x-slot>
                                @endif
                            </x-common.input-file-flex>
                        </div>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
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