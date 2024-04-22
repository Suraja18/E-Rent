<x-users.main.app-layout>
    <x-slot name="head">
        - Company
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Company</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.company.store') }}" method="POST">
            @csrf
            <div class="admin">
                <h4 class="mb-1">Display Images</h4>
                <div class="add-img-container">
                    <div class="add-flex-4">
                        <x-common.input-file-flex>
                            <x-slot name="image">Logo</x-slot>
                            @if(isset($company->logo))
                                <x-slot name="value2">{!! asset($company->logo) !!}</x-slot>
                            @endif
                        </x-common.input-file-flex>
                    </div>
                </div>
            </div> 
            <x-common.input-text-100>
                <x-slot name="column">Email</x-slot>
                <x-slot name="value">{!! $company->email !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Address</x-slot>
                <x-slot name="value">{!! $company->address !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Phone Number</x-slot>
                <x-slot name="value">{!! $company->phone_number !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Linkedin</x-slot>
                <x-slot name="value">{!! $company->linkedin !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Facebook</x-slot>
                <x-slot name="value">{!! $company->facebook !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Instagram</x-slot>
                <x-slot name="value">{!! $company->instagram !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Twitter</x-slot>
                <x-slot name="value">{!! $company->twitter !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Contact Description</x-slot>
                <x-slot name="value">{!! $company->contact_description !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Google map</x-slot>
                <x-slot name="valuemap">{!! $company->google_map !!}</x-slot>
                <x-slot name="value">{!! $company->google_map !!}</x-slot> 
            </x-common.input-text-100>
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />                
</x-users.main.app-layout>