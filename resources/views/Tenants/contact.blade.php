<x-users.main.app-layout>
    <x-slot name="head">
        - Contact Us
    </x-slot>
    <x-tenants.navbar />
    <x-common.contact>
        <x-slot name="routes">
            {!! route('tenant.get.contact') !!}
        </x-slot>
    </x-common.contact>
    <x-tenants.footer />
</x-users.main.app-layout>
    