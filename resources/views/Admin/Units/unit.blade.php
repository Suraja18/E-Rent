<x-users.main.app-layout>
    <x-slot name="head">
        - Building Unit
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Building Unit</x-slot>
    </x-admin.banners>
    <div class="row bs-g-2 bg-1">
        <div class="error-rows units display-33">
            <x-landlords.new-body>
                @if(isset($type2))
                    <form enctype="multipart/form-data" action="{{ route('unit.update', $unit) }}" method="POST">
                        @method('PUT')
                @else
                    <form enctype="multipart/form-data" action="{{ route('unit.store') }}" method="POST">
                @endif
                        @csrf
                        <x-common.input-text-100>
                            <x-slot name="column">Building Unit</x-slot>
                            @if (isset($unit->building_unit))
                                <x-slot name="value">{!! $unit->building_unit !!}</x-slot>
                            @endif
                        </x-common.input-text-100>
                        <x-common.input-image-100>
                            @if (isset($unit->image_1))
                                <x-slot name="image1">{!! asset($unit->image_1) !!}</x-slot>
                            @endif
                        </x-common.input-image-100>
                        <x-common.input-text-100>
                            <x-slot name="nones">" "</x-slot>
                            <x-slot name="column">Rooms</x-slot>
                            <x-slot name="number">number</x-slot>
                            @if (isset($unit->rooms))
                                <x-slot name="value">{!! $unit->rooms !!}</x-slot>
                            @endif
                            <x-slot name="head6"><h6 class="mb-1 mt-1">Note: For Full House Empty Room, For Full Floor Room = 0</h6></x-slot>
                        </x-common.input-text-100>
                        <x-common.text-area-desc>
                            <x-slot name="column">Description</x-slot>
                            @if (isset($unit->description))
                                <x-slot name="value">{!! $unit->description !!}</x-slot>
                            @endif
                        </x-common.text-area-desc>

                        <div class="text-center">
                            @if(isset($type2))
                                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
                            @else
                                <input type="submit" value="Add" class="is-button-for-edit-profile is-hovers" />
                            @endif
                        </div>
                    </form>
            </x-landlords.new-body>
        </div>
    
        <div class="error-rows display-67">
            <x-landlords.responsive-table>
                <x-slot name="heading">Building Unit</x-slot>
                <x-slot name="thead">
                    <tr>
                        <th>S.N</th>
                        <th>Icons</th>
                        <th>Building Unit</th>
                        <th>Rooms</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($units as $unit)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td class="image-table-cell">
                                <div class="table-images">
                                    <img src="{!! asset($unit->image_1) !!}" class="tables-image-round" alt="{!! $unit->building_unit !!}">
                                </div>
                            </td>
                            <td data-name="Building Unit">{!! $unit->building_unit !!}</td>
                            <td data-name="Rooms">{!! $unit->rooms !!}</td>
                            <td data-name="Description">
                                @if(strlen($unit->description) > 70)
                                    {!! substr($unit->description, 0, 70) !!}...
                                @else
                                    {!! $unit->description !!}
                                @endif
                            </td>
                            <td class="table-action-cell">
                                <a href="{{ route('unit.edit', $unit) }}" class="table-btns edits">
                                    <span class="action-icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                    </span>
                                    <span class="action-names">Edit</span>
                                </a>
                                <form action="{{ route('unit.destroy', $unit) }}" method="POST" class="table-btns danger" id="deleteTables{!! $unit->id !!}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="none" onclick="return confirmDelete('deleteTables{!! $unit->id !!}')">
                                        <span class="action-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                        </span> 
                                        <span class="action-names">Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
        
                    
                </x-slot>
            </x-landlords.responsive-table>
        </div>
    </div>

    <x-landlords.footer />                
</x-users.main.app-layout>