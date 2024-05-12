<x-users.main.app-layout>
    <x-slot name="head">
        - User Manual
    </x-slot>
    <x-tenants.navbar />

    <section class="clientSays bg-blue-lighter pt-7b">
        <div class="property-wrappers">
            <div class="container is-header">
                <div class="hero-content housing-content-center">
                    <div class="hero-content housing-content-center housing-detail">
                        <img src="{!! asset('Images/Original/Icons/users-property-owners.svg') !!}" alt="Logo" loading="lazy">
                        <h1 class="banner-header">User Manual</h1>
                        <p class="text-testimonial text-center">A Video User Guide to Use the E-Rent Website Features.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-common.manual />

    <x-tenants.footer />

</x-users.main.app-layout>
    