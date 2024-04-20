<x-users.main.app-layout>
    <x-slot name="head">
        - About
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Infinity Images</x-slot>
    </x-admin.banners>
                           
    <div class="row bs-g-2 bg-1">
        <div class="error-rows display-67">
            <x-landlords.responsive-table>
                <x-slot name="heading">Infinity</x-slot>
                <x-slot name="thead">
                    <tr>
                        <th>S.N</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($images as $unit)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td class="image-table-cell">
                                <div class="table-images">
                                    <img src="{!! asset($unit->image) !!}" class="tables-image-round" />
                                </div>
                            </td>
                            <td class="table-action-cell">
                                <form action="{{ route('unit.destroy', $unit) }}" method="POST" class="table-btns danger" id="deleteTables{!! $unit->id !!}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="none" onclick="return confirmDelete('deleteTables{!! $unit->id !!}')">
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
        </div>
        <div class="error-rows units display-33">
            <x-landlords.new-body>
                    <form enctype="multipart/form-data" action="{{ route('unit.store') }}" method="POST">
                        @csrf
                        <x-common.input-image-100 />
                        <div class="text-center">
                            <input type="submit" value="Add" class="is-button-for-edit-profile is-hovers" />
                        </div>
                    </form>
            </x-landlords.new-body>
        </div>
    

    </div>

    <x-landlords.footer />                
</x-users.main.app-layout>