<x-users.main.app-layout>
    <x-users.navbar />
    <x-slot name="head">
        - Press & Media
    </x-slot>
    <x-users.clients-say :press="$press ?? null" />
    <x-common.press-media :type="$press ?? null" />
    <x-users.footer />
</x-users.main.app-layout>