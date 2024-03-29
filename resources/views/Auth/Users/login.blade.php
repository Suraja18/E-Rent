<x-users.main.app-layout>
    <x-slot name="head">
        - Login
    </x-slot>
    <x-users.navbar />
    <section class="register" id="LoginForm">
        <div class="wrapper">
            <div class="inner d-flex">
                <form action="{{ route('user.loginSuccess') }}" method="POST">
                    @csrf
                    <h3>Login</h3>
                    <div class="form-wrapper">
                        <label for>Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-wrapper">
                        <label for>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button>Login</button>
                    <div class="below-btn">New on E-Rent? <a href="{{ route('user.register') }}">Register</a></div>
                </form>
                <div class="image-right-bg">
                    <img src="../Images/Original/bg-login.png" alt="Background">
                </div>
            </div>
        </div>
    </section>
    
</x-users.main.app-layout>