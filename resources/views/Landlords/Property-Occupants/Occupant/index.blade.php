<x-users.main.app-layout>
    <x-slot name="head">
        - Property Occupants
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Property Rented</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="heading">Property Occupants</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th>Building</th>
                <th>Tenant</th>
                <th>Phone Number</th>
                <th>Monthly Rent</th>
                <th>Other Charges</th>
                <th>Last Payment Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($properties as $property)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td data-name="Building" style="flex-direction: column">
                        {!! $property->rentProperty->building->name !!}<br />
                        (<i>{!! $property->rentProperty->rent_name !!}</i>)
                    </td>
                    <td data-name="Phone Number">{!! $property->tenant->first_name !!} {!! $property->tenant->last_name !!}</td>
                    <td data-name="Phone Number">{!! $property->tenant->phone_number !!}</td>
                    <td data-name="Monthly Rent">{!! $property->rentProperty->monthly_house_rent - $property->discount !!}</td>
                    <td data-name="Other Charges">{!! $property->rentProperty->electric_charge + $property->rentProperty->water_charge + $property->rentProperty->garbage_charge !!}</td>
                    @php
                        $payment = $property->payments()->latest()->first();
                    @endphp
                    <td data-name="Last Payment Date">
                        @if($payment != null)
                            {!! $payment->created_at->toDateString() !!}
                        @else
                            Not deposited yet
                        @endif
                    </td>
                    @php
                        $rentedProperty = $property;
                        if ($rentedProperty->rentProperty->type == "Rent") {
                            $rentPrice = $rentedProperty->rentProperty->monthly_house_rent +
                                $rentedProperty->rentProperty->electric_charge +
                                $rentedProperty->rentProperty->water_charge +
                                $rentedProperty->rentProperty->garbage_charge -
                                $rentedProperty->discount;
                        } elseif ($rentedProperty->rentProperty->type == "Sell") {
                            $rentPrice = $rentedProperty->rentProperty->price - $rentedProperty->discount;
                        }

                        $totalPaid = 0 - $rentPrice;
                        $payments = App\Models\RentPayment::where('rented_id', $rentedProperty->id)->get();
                        $paymentrent = App\Models\RentPayment::where('rented_id', $rentedProperty->id)->first();
                        if($paymentrent)
                        {
                            $createdAt = Carbon\Carbon::parse($paymentrent->created_at);
                            $today = Carbon\Carbon::today();     
                            $diffInMonths = $createdAt->diffInMonths($today);
                        }
                        foreach ($payments as $payment) {
                            $totalPaid += $payment->amt_paid;
                        }
                        $rentToPay = 0;
                        $remainToPay = 0;
                        if(isset($diffInMonths)){
                            for($i = 0; $i < $diffInMonths; $i++)
                            {
                                $rentToPay = $rentToPay + $rentPrice;
                            }
                        }

                        $remainingAmount = $rentToPay - $totalPaid;
                        $status = $remainingAmount > 0 ? 'Unpaid' : 'Paid';
                    @endphp
                            <td data-name="Status">
                        @if($payment != null)
                            {!! $status !!}
                        @else
                            Unpaid
                        @endif
                    </td>
                    <td class="table-action-cell">
                        @if ($status == "Unpaid")
                        <a href="{{ route('landlord.property.rent.notify', ['id' => $property->id, 'amt' => $remainingAmount]) }}" class="table-btns edits">
                            <span class="action-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M205 34.8c11.5 5.1 19 16.6 19 29.2v64H336c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96H224v64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z"/></svg>
                            </span>
                            <span class="action-names">Notify</span>
                        </a>
                        @endif
                        
                    </td>
                </tr>
            @endforeach

            
        </x-slot>
    </x-landlords.responsive-table>


    <x-landlords.footer />                
</x-users.main.app-layout>