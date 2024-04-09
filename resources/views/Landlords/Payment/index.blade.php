<x-users.main.app-layout>
    <x-slot name="head">
        - Payment
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Payment</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="links">{!! route('payment.create') !!}</x-slot>
        <x-slot name="heading">Payment Lists</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th>Date</th>
                <th>Tenant</th>
                <th>Building</th>
                <th>Amount Paid</th>
                <th>Mode</th>
                <th>Type</th>
                <th>Action</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($payments as $payment)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td data-name="Date">{!! $payment->created_at->toDateString() !!}</td>
                    <td data-name="Tenant">{!! $payment->rentedProperty->tenant->first_name !!} {!! $payment->rentedProperty->tenant->last_name !!}</td>
                    <td data-name="Building">
                        {!! $payment->rentedProperty->rentProperty->building->name !!}<br/>
                        @if(isset($payment->rentedProperty->rentProperty->rent_name))
                            <small>(<i>{!! $payment->rentedProperty->rentProperty->rent_name !!}</i>)</small><br/>
                        @endif
                        Type: (<i>{!! $payment->rentedProperty->rentProperty->type !!}</i>)
                    </td>
                    <td data-name="Amount Paid">{!! $payment->amt_paid !!}</td>
                    <td data-name="Payment Mode">{!! $payment->payment_mode !!}</td>
                    <td data-name="Payment Type">{!! $payment->payment_type !!}</td>
                    <td class="table-action-cell">
                        <a href="{!! route('payment.show', $payment) !!}" class="table-btns">
                            <span class="action-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            </span>
                            <span class="action-names">View</span>
                        </a>
                        <form action="{{ route('payment.destroy', $payment) }}" method="POST" class="table-btns danger" id="deleteTables{!! $payment->id !!}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="none" onclick="return confirmDelete('deleteTables{!! $payment->id !!}')">
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


    <x-landlords.footer />                
</x-users.main.app-layout>