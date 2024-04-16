<x-users.main.app-layout>
    <x-slot name="head">
        - Tenants Deposited
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Deposited Amount</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="heading">Tenants Deposited Amount</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th></th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Deposit Amount</th>
                <th>Building</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($rentedProperties as $property)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td class="image-table-cell">
                        <div class="table-images">
                            <img src="{!! asset($property->tenant->image) !!}" class="tables-image-round" alt="{!! $property->tenant->first_name !!}">
                        </div>
                    </td>
                    <td data-name="Name">{!! $property->tenant->first_name !!} {!! $property->tenant->last_name !!}</td>
                    <td data-name="Phone Number">{!! $property->tenant->phone_number !!}</td>
                    <td data-name="Address">{!! $property->tenant->address !!}</td>
                    @php
                        $payment = $property->payments->where('payment_type', 'Deposit')->first();
                    @endphp
                    <td data-name="Deposit Amount">{!! $payment->amt_paid !!}</td>
                    <td data-name="Building">
                        {!! $property->rentProperty->building->name !!}<br />
                        (<i>{!! $property->rentProperty->rent_name !!}</i>)
                    </td>
                </tr>
            @endforeach

            
        </x-slot>
    </x-landlords.responsive-table>


    <x-landlords.footer />                
</x-users.main.app-layout>