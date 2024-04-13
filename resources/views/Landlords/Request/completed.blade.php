<x-users.main.app-layout>
    <x-slot name="head">
        - Maintenance Request
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Maintenance Request</x-slot>
    </x-landlords.banners>
               
    @if($count > 0)
    <x-landlords.responsive-table>
        <x-slot name="heading">Maintenance Request</x-slot>
        <x-slot name="thead">
            <tr>
                <th>#</th>
                <th></th>
                <th>Tenants</th>
                <th>Building</th>
                <th>Title</th>
                <th>Description</th>
                <th>Initiated Date</th>
                <th>Availability Time</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($mRequest as $rent) 
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td class="image-table-cell">
                        <div class="table-images">
                            @if ($rent->rentedProperty->rentProperty->type == "Rent")
                                <img src="{!! asset($rent->rentedProperty->rentProperty->image_1) !!}" class="tables-image-round" alt="{!! $rent->rentedProperty->rentproperty->rent_name !!}">
                            @else
                                <img src="{!! asset($rent->rentedProperty->rentProperty->building->image_1) !!}" class="tables-image-round" alt="{!! $rent->rentedProperty->rentproperty->building->name !!}">
                            @endif
                            
                        </div>
                    </td>
                    <td data-name="Tenants">{!! $rent->rentedProperty->tenant->first_name !!} {!! $rent->rentedProperty->tenant->last_name !!} ({!! $rent->rentedProperty->tenant->phone_number !!})</td>
                    <td data-name="Building">{!! $rent->rentedProperty->rentproperty->building->name !!}/{!! $rent->rentedProperty->rentproperty->rent_name !!} ({!! $rent->rentedProperty->rentproperty->building->address !!})</td>
                    <td data-name="Title">{!! $rent->title !!}</td>
                    <td data-name="Description">
                        @if(strlen($rent->description) > 70)
                            {!! substr($rent->description, 0, 70) !!}...
                        @else
                            {!! $rent->description !!}
                        @endif
                    </td>
                    <td data-name="Initiated Date">{!! $rent->date !!}</td>
                    <td data-name="Availability Time">{!! $rent->time1 !!}</td>
                    <td data-name="Priority">{!! $rent->piority !!}</td>
                    <td data-name="Status">{!! $rent->status !!}</td>
                    <td class="table-action-cell">
                        <a href="{{ route('landlord.maintenance.view', $rent->id) }}" class="table-btns">
                            <span class="action-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            </span>
                            <span class="action-names">View</span>
                        </a>
                        <form action="{{ route('landlord.maintenance.destroy', $rent) }}" method="GET" class="table-btns danger" id="deleteTables{!! $rent->id !!}">
                            @csrf
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
    @else
     <!-- WHen There is No Request -->
     <div class="placeholder no-request" style="min-height: 35vw">
        <div class="placeholder-container">
            <div class="placeholder-grid opacity-low">
                <ul class="loading-req">
                    <li class="placeholder-card">
                        <span class="placeholder-bar-progress"></span>
                    </li>
                    <li class="placeholder-card">
                        <span class="placeholder-bar-progress"></span>
                    </li>
                </ul>
                <div class="placeholder-grid no-req">
                    <svg height="35" width="35" class="mb-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" fill="#3d3975"/>
                    </svg>
                    <div class="placeholder-sub-header">
                        No requests
                    </div>
                    <p class="paragraph text-center text-small-for-mobile"> There is no completed maintenance request at all. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of WHen There is No Request -->
    @endif


    <x-landlords.footer />                
</x-users.main.app-layout>