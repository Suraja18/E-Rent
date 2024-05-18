<x-users.main.app-layout>
    <x-slot name="head">
        - Forgot Password
    </x-slot>
    <x-users.navbar />
    <section class="register" id="LoginForm">
        <div class="wrapper">
            <div class="inner d-flex">
                <form action="{{ route('user.send.pass') }}" method="POST">
                    @csrf
                    <h3>Forget Password</h3>
                    <div class="form-wrapper">
                        <label for>Email</label>
                        <input type="email" class="form-control" name="email" required />
                    </div>
                    <button>Submit</button>
                </form>
                <div class="image-right-bg">
                    <img src="{!! asset('Images/Original/bg-login.png') !!}" alt="Background">
                </div>
            </div>
        </div>
    </section>
    
</x-users.main.app-layout>