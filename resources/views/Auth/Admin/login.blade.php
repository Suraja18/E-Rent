<x-users.main.app-layout>
    <x-slot name="head">
        - Login
    </x-slot>
    <x-users.navbar />
    <section class="register" id="LoginForm">
        <div class="wrapper">
            <div class="inner d-flex">
                <form action="{{ route('admin.login.success') }}" method="POST">
                    @csrf
                    <h3>Login</h3>
                    <div class="form-wrapper">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required />
                    </div>
                    <div class="form-wrapper">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required />
                        <div class="d-flex">
                            <input type="checkbox" class="checkbox" id="show_new_password" />
                            <label for="show_new_password" class="show-password-checkbox">Show Password</label>
                        </div>
                    </div>
                    <button>Login</button>
                </form>
                <div class="image-right-bg">
                    <img src="{!! asset('Images/Original/bg-login.png') !!}" alt="Background">
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const showPasswordCheckboxes = document.querySelectorAll('.checkbox');

            showPasswordCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    const passwordInputContainer = this.parentElement.previousElementSibling;
                    if (passwordInputContainer) {
                        if (passwordInputContainer) {
                            passwordInputContainer.type = this.checked ? 'text' : 'password';
                        } else {
                            console.error('Password input element not found');
                        }
                    } else {
                        console.error('Password input container not found');
                    }
                });
            });
        });
    </script>
    
</x-users.main.app-layout>