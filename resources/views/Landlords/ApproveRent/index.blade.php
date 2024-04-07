<x-users.main.app-layout>
    <x-slot name="head">
        - Approve Rent
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Approve Rent</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="heading">Building Lists</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th></th>
                <th>Building</th>
                <th>Type</th>
                <th>Tenant Name</th>
                <th>Phone Number</th>
                <th>Price</th>
                <th>Action</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($rentedProperties as $rent) 
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td class="image-table-cell">
                        <div class="table-images">
                            @if ($rent->rentProperty->type == "Rent")
                                <img src="{!! asset($rent->rentProperty->image_1) !!}" class="tables-image-round" alt="{!! $rent->rentproperty->rent_name !!}">
                            @else
                                <img src="{!! asset($rent->rentProperty->building->image_1) !!}" class="tables-image-round" alt="{!! $rent->rentproperty->building->name !!}">
                            @endif
                            
                        </div>
                    </td>
                    <td data-name="Building"><a href="{!! route('building.show', $rent->rentproperty->building) !!}"> {!! $rent->rentproperty->building->name !!}<br/>(<i>{!! $rent->rentproperty->unit->building_unit !!}</i>)</a></td>
                    <td data-name="Type">{!! $rent->rentproperty->type !!}</td>
                    <td data-name="Tenant Name">{!! $rent->tenant->first_name !!}  {!! $rent->tenant->last_name !!}</td>
                    <td data-name="Phone Number">{!! $rent->tenant->phone_number !!}</td>
                    <td data-name="Price"> @if ($rent->rentProperty->type == "Rent") {!! $rent->rentProperty->monthly_house_rent !!} @else {!! $rent->rentProperty->price !!} @endif</td>
                    <td class="table-action-cell">
                        <a href="{{ route('approve.edit', $rent) }}" class="table-btns">
                            <span class="action-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            </span>
                            <span class="action-names">Approve</span>
                        </a>
                        <form action="{{ route('approve.destroy', $rent) }}" method="POST" class="table-btns danger" id="deleteTables{!! $rent->id !!}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="none" onclick="return confirmDelete('deleteTables{!! $rent->id !!}')">
                                <span class="action-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </span>
                                <span class="action-names">Decline</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            
        </x-slot>
    </x-landlords.responsive-table>


    <x-landlords.footer />                
</x-users.main.app-layout>