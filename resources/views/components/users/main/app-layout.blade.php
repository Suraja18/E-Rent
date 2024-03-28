<!DOCTYPE html>
<html lang="en">
    <x-users.main.head>
        @if(isset($head))
            {{ $head }}
        @endif
    </x-users.main.head>
    <body>
        <x-users.navbar />
        {{ $slot }}
        <x-users.footer />
        <x-users.main.js>
            @if(isset($scripts))
                {{ $scripts }}
            @endif
        </x-users.main.js>
    </body>
</html>