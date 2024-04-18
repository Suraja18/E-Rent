<x-users.main.app-layout>
    <x-slot name="head">
        - Change Password
    </x-slot>
    <x-users.navbar />
    <section class="register" id="LoginForm">
        <div class="wrapper">
            <div class="inner d-flex">
                <form action="{{ Auth::user()->roles === 1 ? route('tenant.try.change.email') : route('landlord.try.change.email')  }}" method="POST">
                    @csrf
                    <h3>Change Email</h3>
                    <div class="form-wrapper">
                        <label for="email">New Email</label>
                        <input type="email" class="form-control" name="email" required />
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" />
                        <div class="d-flex">
                            <input type="checkbox" class="checkbox" id="show_new_password" />
                            <label for="show_new_password" class="show-password-checkbox">Show Password</label>
                        </div>
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <button>Change Email</button>
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
