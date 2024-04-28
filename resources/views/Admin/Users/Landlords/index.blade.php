<x-users.main.app-layout>
    <x-slot name="head">
        - Landlords
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">All Landlords</x-slot>
    </x-admin.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="heading">Landlords</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($users as $user)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td class="image-table-cell">
                        <div class="table-images">
                            <img src="{!! asset($user->image) !!}" class="tables-image-round" />
                        </div>
                    </td>
                    <td data-name="Name">{!! $user->first_name !!} {!! $user->last_name !!}</td>
                    <td data-name="Email">{!! $user->email !!}</td>
                    <td data-name="Phone">{!! $user->phone_number !!}</td>
                    <td data-name="Address">{!! $user->address !!}</td>
                    <td class="table-action-cell">
                        <form action="{{ route('admin.deactivate.user', $user) }}" method="POST" class="table-btns danger" id="deleteTables{!! $user->id !!}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="none" onclick="return confirmDelete('deleteTables{!! $user->id !!}')">
                                <span class="action-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </span>
                                <span class="action-names">Deactivate</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            
        </x-slot>
    </x-landlords.responsive-table>


    <x-landlords.footer />                
</x-users.main.app-layout>