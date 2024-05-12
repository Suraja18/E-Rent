<x-users.main.app-layout>
    <x-slot name="head">
        - All Property
    </x-slot>
    <x-tenants.navbar />
     <!-- Property Banner -->
     <section class="clientSays bg-blue-lighter pt-7b">
        <div class="property-wrappers">
            <div class="container is-header">
                <div class="hero-content housing-content-center">
                    <div class="hero-content housing-content-center housing-detail">
                        <img src="{!! asset('Images/Original/Icons/House-Heart.svg') !!}" alt="Logo" loading="lazy">
                        <h1 class="banner-header">Property List</h1>
                        <p class="text-testimonial text-center">Discover your dream home with our extensive property listings. From modern apartments to spacious houses, explore a diverse range of options. Find the perfect property that suits your lifestyle and preferences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Property Banner -->

    <x-tenants.property-search :search="$search ?? null" />

    <x-tenants.property-detail :properties="$properties ?? null" />

    <x-users.showing-ads />

    <x-tenants.footer />

</x-users.main.app-layout>