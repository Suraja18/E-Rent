<x-users.main.app-layout>
    <x-slot name="head">
        - Contact
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="name">Contact Us</x-slot>
    </x-landlords.banners>
                           
    <x-common.contact>
        <x-slot name="routes">
            {!! route('landlord.get.contact') !!}
        </x-slot>
    </x-common.contact>


    <x-landlords.footer />                
</x-users.main.app-layout>