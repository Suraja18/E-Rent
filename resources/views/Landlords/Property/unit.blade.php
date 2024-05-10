<x-users.main.app-layout>
    <x-slot name="head">
        - Building Unit
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Building Unit</x-slot>
    </x-landlords.banners>
    <div class="row bs-g-2 bg-1">
        <div class="error-rows units display-33">
            <x-landlords.new-body>
                <form enctype="multipart/form-data" action="{{ route('landlord.unit.store') }}" method="POST">
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
                        <input type="submit" value="Add" class="is-button-for-edit-profile is-hovers" />
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
                        </tr>
                    @endforeach
        
                    
                </x-slot>
            </x-landlords.responsive-table>
        </div>
    </div>

    <x-landlords.footer />                
</x-users.main.app-layout>