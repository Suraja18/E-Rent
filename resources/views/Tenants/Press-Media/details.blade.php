<x-users.main.app-layout>
    <x-tenants.navbar />
    <x-slot name="head">
        - Press & Media
    </x-slot>
    <x-users.clients-say :press="$press ?? null" />
    <x-common.press-media :type="$press ?? null" />
    <x-tenants.footer />
</x-users.main.app-layout>