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
                            <input type="text" class="form-control" name="firstName">
                            @error('firstName')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-wrapper">
                            <label for>Last Name</label>
                            <input type="text" class="form-control" name="lastName">
                            @error('lastName')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <label for>Email</label>
                        <input type="text" class="form-control" name="email">
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for>Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-wrapper">
                        <label for>Confirm Password</label>
                        <input type="password" class="form-control">
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
</x-users.main.app-layout>