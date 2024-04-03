<x-users.main.app-layout>
    <x-slot name="head">
        - Add Property Rent
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('rent.index') }}" class="banner-link-for-header"> Rent</a>
            </li>
        </x-slot>
        <x-slot name="name">Add Property Rent</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('rent.store') }}" method="POST">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Rent Name</x-slot>
            </x-common.input-text-100>
            <x-common.input-select-100>
                <x-slot name="column">Building</x-slot>
                @foreach ($buildings as $building)
                    <option value="{!! $building->id !!}">{!! $building->name !!}</option>
                @endforeach
            </x-common.input-select-100>
            <x-common.input-select-50>
                <x-slot name="column1">Property Type</x-slot>
                <x-slot name="option1">
                    @foreach ($units as $unit)
                        <option value="{!! $unit->id !!}">{!! $unit->building_unit !!}</option>
                    @endforeach
                </x-slot>
                <x-slot name="column2">Floor</x-slot>
                <x-slot name="option2">
                    
                </x-slot>
            </x-common.input-select-50>
            <x-common.input-image-25 />
            <x-common.input-text-50>
                <x-slot name="column1">Area</x-slot>
                <x-slot name="number1">Number</x-slot>
                <x-slot name="column2">No of Bed</x-slot>
                <x-slot name="number2">Number</x-slot>
            </x-common.input-text-50>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
            </x-common.ck-imageless>
            <x-common.input-text-50>
                <x-slot name="column1">Monthly House Rent</x-slot>
                <x-slot name="number1">Number</x-slot>
                <x-slot name="column2">Electric Charge</x-slot>
                <x-slot name="number2">Number</x-slot>
            </x-common.input-text-50>
            <x-common.input-text-50>
                <x-slot name="column1">Water Charge</x-slot>
                <x-slot name="number1">Number</x-slot>
                <x-slot name="column2">Garbage Charge</x-slot>
                <x-slot name="number2">Number</x-slot>
            </x-common.input-text-50>
            <x-common.toggle-status />
            <div class="text-center">
                <input type="submit" value="Put on Rent" class="is-button-for-edit-profile is-hovers" />
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