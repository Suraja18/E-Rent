<x-users.main.app-layout>
    <x-slot name="head">
        - Edit Property Rent
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('rent.index') }}" class="banner-link-for-header"> Rent</a>
            </li>
        </x-slot>
        <x-slot name="name">Edit Property Rent</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('rent.update', $rent) }}" method="POST">
            @method('PUT')
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Rent Name</x-slot>
                <x-slot name="value">{!! $rent->rent_name !!}</x-slot>
            </x-common.input-text-100>
            <x-common.input-select-100>
                <x-slot name="column">Building</x-slot>
                @if (isset($rent->building_id ))
                    <x-slot name="type"><option value="{!! $rent->building->id !!}">{!! $rent->building->name !!}</option></x-slot>
                @endif
                @foreach ($buildings as $building)
                    <option value="{!! $building->id !!}">{!! $building->name !!}</option>
                @endforeach
            </x-common.input-select-100>
            <x-common.input-select-50>
                <x-slot name="column1">Property Type</x-slot> 
                @if (isset($rent->property_type_id ))
                    <x-slot name="type1"><option value="{!! $rent->property_type_id !!}">{!! $rent->unit->building_unit !!}</option></x-slot>
                @endif
                <x-slot name="option1">
                    @foreach ($units as $unit)
                        <option value="{!! $unit->id !!}">{!! $unit->building_unit !!}</option>
                    @endforeach
                </x-slot>
                <x-slot name="column2">Floor</x-slot>
                @if (isset($rent->floor ))
                    <x-slot name="type2"><option value="{!! $rent->floor !!}">{!! $rent->floor !!}</option></x-slot>
                @endif
                <x-slot name="option2">
                    
                </x-slot>
            </x-common.input-select-50>
            <x-common.input-image-25>
                <x-slot name="image1">{!! asset($rent->image_1) !!}</x-slot>
                <x-slot name="image2">{!! asset($rent->image_2) !!}</x-slot>
                <x-slot name="image3">{!! asset($rent->image_3) !!}</x-slot>
                <x-slot name="image4">{!! asset($rent->image_4) !!}</x-slot>
            </x-common.input-image-25>
            <x-common.input-text-50>
                <x-slot name="column1">Area</x-slot>
                <x-slot name="number1">Number</x-slot>
                <x-slot name="value1">{!! $rent->area !!}</x-slot>
                <x-slot name="column2">No of Bed</x-slot>
                <x-slot name="number2">Number</x-slot>
                <x-slot name="value2">{!! $rent->no_of_bed !!}</x-slot>
            </x-common.input-text-50>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $rent->description !!}</x-slot>
            </x-common.ck-imageless>
            <x-common.input-text-50>
                <x-slot name="column1">Monthly House Rent</x-slot>
                <x-slot name="number1">Number</x-slot>
                <x-slot name="value1">{!! $rent->monthly_house_rent !!}</x-slot>
                <x-slot name="column2">Electric Charge</x-slot>
                <x-slot name="number2">Number</x-slot>
                <x-slot name="value2">{!! $rent->electric_charge !!}</x-slot>
            </x-common.input-text-50>
            <x-common.input-text-50>
                <x-slot name="column1">Water Charge</x-slot>
                <x-slot name="number1">Number</x-slot>
                <x-slot name="value1">{!! $rent->water_charge !!}</x-slot>
                <x-slot name="column2">Garbage Charge</x-slot>
                <x-slot name="number2">Number</x-slot>
                <x-slot name="value2">{!! $rent->garbage_charge !!}</x-slot>
            </x-common.input-text-50>
            <x-common.input-select-100>
                <x-slot name="column">Forum</x-slot>
                @if (isset($rent->forum_id ))
                    <x-slot name="type"><option value="{!! $rent->forum->id !!}">{!! $rent->forum->heading !!}</option></x-slot>
                @endif
                @foreach ($forums as $forum)
                    <option value="{!! $forum->id !!}">{!! $forum->heading !!}</option>
                @endforeach
            </x-common.input-select-100>
            <x-common.toggle-status>
                @if (isset($rent->status))
                    {!! $rent->status == 'Yes' ? 'checked' : '' !!}
                @endif
            </x-common.toggle-status>
            <div class="text-center">
                <input type="submit" value="Update Rent" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
    
    
    <script>
        document.getElementById('building_id').addEventListener('change', function() {
            var buildingId = this.value;
            var floorSelect = document.getElementById('floor');
            floorSelect.innerHTML = '';
    
            fetch('/landlords/get-floors/' + buildingId)
                .then(response => response.json())
                .then(data => {
                    var numberOfFloors = data.numberOfFloors;
                    for (var i = 1; i <= numberOfFloors; i++) {
                        var option = document.createElement('option');
                        option.value = i;
                        option.text = 'Floor ' + i;
                        floorSelect.appendChild(option);
                    }
                })
                .catch(error => {
                    console.error('Error fetching floors:', error);
                });;
        });
    </script>
</x-users.main.app-layout>