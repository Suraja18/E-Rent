<div class="admin">
    <h4 class="mb-1">Display Images</h4>
    <div class="add-img-container">
        <div class="add-flex-2">
            <x-common.input-file-flex><x-slot name="image">Image 1</x-slot></x-common.input-file-flex>
        </div>
        <div class="add-flex-2">
            <x-common.input-file-flex><x-slot name="image">Image 2</x-slot><x-slot name="type2">empty</x-slot></x-common.input-file-flex>
        </div>
    </div>
    @if(isset($type))
    @else
    <h6 class="mb-1 mt-1">Note: Please Insert Transparent Background Image ( Image: 2 = Optional )</h6>
    @endif
</div>