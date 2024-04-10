<x-users.main.app-layout>
    <x-slot name="head">
        - Vacant Property
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Vacant Property</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="heading">Vacant Property</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th></th>
                <th>Building</th>
                <th>Address</th>
                <th>Type</th>
                <th>Price</th>
                <th>Other Charges</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($properties as $property)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td class="image-table-cell">
                        <div class="table-images">
                            @if($property->image_1 == null)
                                <img src="{!! asset($property->building->image_1) !!}" class="tables-image-round" alt="{!! $property->building->name !!}">
                            @else
                                <img src="{!! asset($property->image_1) !!}" class="tables-image-round" alt="{!! $property->rent_name !!}">
                            @endif
                        </div>
                    </td>
                    <td data-name="Building" style="flex-direction: column">
                        {!! $property->building->name !!}
                        @if($property->image_1 != null)
                            (<i>{!! $property->rent_name !!}</i>)
                        @endif
                    </td>
                    <td data-name="Address">{!! $property->building->address !!}</td>
                    <td data-name="Type">{!! $property->type !!}</td>
                    <td data-name="Price">
                        @if($property->type == "Rent")
                            {!! $property->monthly_house_rent !!}
                        @else
                            {!! $property->price !!}
                        @endif
                    </td>
                    <td data-name="Other Charges">{!! $property->electric_charge + $property->water_charge + $property->garbage_charge !!}</td>
                </tr>
            @endforeach

            
        </x-slot>
    </x-landlords.responsive-table>


    <x-landlords.footer />                
</x-users.main.app-layout>