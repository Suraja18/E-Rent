<x-users.main.app-layout>
    <x-slot name="head">
        - 404 Error
    </x-slot>

    <div class="contaier fade-animate">
        <div class="contaier text-center">
            <div class="row center-justify">
                <div class="error-rows">
                    <img src="{!! asset('Images/Original/Icons/Error.svg') !!}" alt="Error" class="error-img error-images">
                    <h1 class="error-img">404</h1>
                    <h1 class="mb-2p">Page Not Found!</h1>
                    <p class="mb-2p">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                    <a href="{!! route('user.home') !!}" class="btnPrimary navButton">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>

</x-users.main.app-layout>