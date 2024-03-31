<div class="admin">
    <h4 class="mb-1">Display Images</h4>
    <div class="add-img-container">
        <div class="add-flex-4">
            <x-common.input-file-flex>
                <x-slot name="image">Image 1</x-slot>
                @if(isset($image1))
                    <x-slot name="value2">{!! $image1 !!}</x-slot>
                @endif
                @if(isset($type))
                    <x-slot name="type">{!! $type !!}</x-slot>
                @endif
            </x-common.input-file-flex>
        </div>
        <div class="add-flex-4">
            <x-common.input-file-flex>
                <x-slot name="image">Image 2</x-slot>
                @if(isset($image2))
                    <x-slot name="value2">{!! $image2 !!}</x-slot>
                @endif
                @if(isset($type))
                    <x-slot name="type">{!! $type !!}</x-slot>
                @endif
                <x-slot name="type2">empty</x-slot>
            </x-common.input-file-flex>
        </div>
        <div class="add-flex-4">
            <x-common.input-file-flex>
                <x-slot name="image">Image 3</x-slot>
                @if(isset($image3))
                    <x-slot name="value2">{!! $image3 !!}</x-slot>
                @endif
                @if(isset($type))
                    <x-slot name="type">{!! $type !!}</x-slot>
                @endif
                <x-slot name="type2">empty</x-slot>
            </x-common.input-file-flex>
        </div>
        <div class="add-flex-4">
            <x-common.input-file-flex>
                <x-slot name="image">Image 4</x-slot>
                @if(isset($image4))
                    <x-slot name="value2">{!! $image4 !!}</x-slot>
                @endif
                @if(isset($type))
                    <x-slot name="type">{!! $type !!}</x-slot>
                @endif
                <x-slot name="type2">empty</x-slot>
            </x-common.input-file-flex>
        </div>
    </div>
    @if(!isset($type))
        <h6 class="mb-1 mt-1">Note: Please Insert Transparent Background Image ( Image: 2,3,4 = Optional )</h6>
    @endif
</div>
