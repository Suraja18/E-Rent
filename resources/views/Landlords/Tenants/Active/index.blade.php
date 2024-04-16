<x-users.main.app-layout>
    <x-slot name="head">
        - Active Tenants
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Tenants</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="heading">Active Tenants</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th></th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($tenants as $tenant)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td class="image-table-cell">
                        <div class="table-images">
                            <img src="{!! asset($tenant->image) !!}" class="tables-image-round" alt="{!! $tenant->first_name !!}">
                        </div>
                    </td>
                    <td data-name="Name">{!! $tenant->first_name !!} {!! $tenant->last_name !!}</td>
                    <td data-name="Phone Number">{!! $tenant->phone_number !!}</td>
                    <td data-name="Email">{!! $tenant->email !!}</td>
                    <td data-name="Address">{!! $tenant->address !!}</td>
                    <td class="table-action-cell">
                        <a href="{{ route('landlord.email.send.id', $tenant->id) }}" class="table-btns edits">
                            <span class="action-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                            </span>
                            <span class="action-names">Send Email</span>
                        </a>
                    </td>
                </tr>
            @endforeach

            
        </x-slot>
    </x-landlords.responsive-table>


    <x-landlords.footer />                
</x-users.main.app-layout>