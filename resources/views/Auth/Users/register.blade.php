<x-users.main.app-layout>
    <x-slot name="head">
        - Register
    </x-slot>
    <x-users.navbar />
    <section class="register">
        <div class="wrapper">
            <div class="inner d-flex">
                <form action="{{ route('user.completeRegister') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>Registration Form</h3>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for>First Name</label>
                            <input type="text" class="form-control" name="first_name" required />
                            @error('firstName')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-wrapper">
                            <label for>Last Name</label>
                            <input type="text" class="form-control" name="last_name" required />
                            @error('lastName')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <label for>Email</label>
                        <input type="text" class="form-control" name="email" required />
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for>Password</label>
                        <input type="password" class="form-control" name="password" required />
                        <div class="d-flex">
                            <input type="checkbox" class="checkbox" id="password" />
                            <label for="password" class="show-password-checkbox">Show Password</label>
                        </div>
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" />
                        <div class="d-flex">
                            <input type="checkbox" class="checkbox" id="confirm_password" />
                            <label for="confirm_password" class="show-password-checkbox">Show Password</label>
                        </div>
                        @error('confirm_password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label>Are you a</label>
                        <div class="form-radio-wrapper">
                            <input id="landlord" type="radio" class="form-radio" name="roles" value="2">
                            <label for="landlord">Landlord</label>
                            <input id="tenants" type="radio" class="form-radio" name="roles" value="1">
                            <label for="tenants">Tenants</label>
                        </div>  
                        @error('roles')
                            <p class="error-message">{{ $message }}</p>
                        @enderror 
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> I accept the Terms of Use
                            &amp; Privacy Policy.
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <button type="submit">Register Now</button>
                    <div class="below-btn">Already  have an account? <a href="{{ route('user.login') }}">Log in.</a></div>
                </form>
                <div class="image-right-bg">
                    <img src="../Images/Original/bg-remove.png" alt="Background">
                </div>
            </div>
        </div>
    </section>
    <div class="mb-45p"></div>
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