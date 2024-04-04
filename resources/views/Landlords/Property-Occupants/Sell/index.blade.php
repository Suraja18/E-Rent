<x-users.main.app-layout>
    <x-slot name="head">
        - Building Sell
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Building Sell</x-slot>
    </x-landlords.banners>
    <div class="row bs-g-2 bg-1">
        <div class="error-rows units display-33">
            <x-landlords.new-body>
                @if(isset($type))
                    <form enctype="multipart/form-data" action="{{ route('house-sell.update', $rent) }}" method="POST">
                        @method('PUT')
                        <input type="hidden" name="id" value="{!! $rent->id !!}" /> 
                @else
                    <form enctype="multipart/form-data" action="{{ route('house-sell.store') }}" method="POST">
                @endif
                        @csrf
                        <x-common.input-select-100>
                            <x-slot name="column">Building</x-slot>
                            @if (isset($type))
                                <x-slot name="type"><option value="{!! $rent->building->id !!}">{!! $rent->building->name !!}</option></x-slot>
                            @endif
                            @foreach ($buildings as $building)
                                <option value="{!! $building->id !!}">{!! $building->name !!}</option>
                            @endforeach
                        </x-common.input-select-100>
                        <x-common.input-select-100>
                            <x-slot name="column">Property Type</x-slot>
                            @if (isset($type))
                                <x-slot name="type"><option value="{!! $rent->property_type_id !!}">{!! $rent->unit->building_unit !!}</option></x-slot>
                            @endif
                            @foreach ($units as $unit)
                                <option value="{!! $unit->id !!}">{!! $unit->building_unit !!}</option>
                            @endforeach
                        </x-common.input-select-100>
                        <x-common.input-text-100>
                            <x-slot name="column">Price</x-slot>
                            <x-slot name="number">number</x-slot>
                            @if (isset($type))
                                <x-slot name="value">{!! $rent->price !!}</x-slot>
                            @endif
                        </x-common.input-text-100>
                        <x-common.input-text-100>
                            <x-slot name="column">Area</x-slot>
                            <x-slot name="number">number</x-slot>
                            @if (isset($type))
                                <x-slot name="value">{!! $rent->area !!}</x-slot>
                            @endif
                        </x-common.input-text-100>
                        <x-common.input-select-100>
                            <x-slot name="column">Forum</x-slot>
                            @if (isset($type))
                                <x-slot name="type"><option value="{!! $rent->forum_id !!}">{!! $rent->forum->heading !!}</option></x-slot>
                            @endif
                            @foreach ($forums as $forum)
                                <option value="{!! $forum->id !!}">{!! $forum->heading !!}</option>
                            @endforeach
                        </x-common.input-select-100>
                        <x-common.toggle-status>
                            @if (isset($type))
                                {!! $rent->status == 'Yes' ? 'checked' : '' !!}
                            @endif
                        </x-common.toggle-status>
                        
                        <div class="text-center">
                            <input type="submit" value="Put on Sale" class="is-button-for-edit-profile is-hovers" />
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
                        <th>Building</th>
                        <th>Area</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($rents as $rent)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td data-name="Building">{!! $rent->building->name !!}</td>
                            <td data-name="Area">{!! $rent->area !!}</td>
                            <td data-name="Price">{!! $rent->price !!}</td>
                            <td data-name="Status">{!! $rent->status !!}</td>
                            <td>
                                <form action="{{ route('house-sell.edit', $rent) }}" method="GET" class="table-btns edits">
                                    @csrf
                                    <input type="hidden" name="id" value="{!! $rent->id !!}" /> 
                                    <button type="submit" class="none">
                                        <span class="action-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                        </span>
                                        <span class="action-names">Edit</span>
                                    </button>
                                    
                                </form>
                                <form action="{{ route('house-sell.destroy', $rent) }}" method="POST" class="table-btns danger" id="deleteTables{!! $rent->id !!}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{!! $rent->id !!}" /> 
                                    <button type="button" class="none" onclick="return confirmDelete('deleteTables{!! $rent->id !!}')">
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