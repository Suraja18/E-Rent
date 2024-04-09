<!DOCTYPE html>
<html lang="en">
    <x-users.main.head>
        @if(isset($head))
            {{ $head }}
        @endif
    </x-users.main.head>
    <body>
        <script src="{{ asset('JS/jquery.min.js') }}" type="text/javascript"></script>
        @include('sweetalert::alert')
        {{ $slot }}
        <x-users.main.js>
            @if(isset($scripts))
                {{ $scripts }}
            @endif
        </x-users.main.js>
    </body>
</html>