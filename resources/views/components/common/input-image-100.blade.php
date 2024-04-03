<div class="admin">
    <h4 class="mb-1">Display Images</h4>
    <div class="add-img-container">
        <div class="add-flex-1">
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
    </div>
    @if(!isset($type))
        <h6 class="mb-1 mt-1">Note: Please Insert Transparent Background Image</h6>
    @endif
</div>
