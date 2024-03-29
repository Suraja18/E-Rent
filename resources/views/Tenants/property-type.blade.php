<x-users.main.app-layout>
    <x-slot name="head">
        - Property Types
    </x-slot>
    <x-tenants.navbar />
     <!-- Property Types Banner -->
     <section class="clientSays bg-blue-lighter pt-7b">
        <div class="property-wrappers">
            <div class="container is-header">
                <div class="hero-content housing-content-center">
                    <div class="hero-content housing-content-center housing-detail">
                        <img src="../Images/Original/Icons/house-type.svg" alt="Logo" loading="lazy">
                        <h1 class="banner-header">Property Types</h1>
                        <p class="text-testimonial text-center">Welcome to E-Rent, your premier online destination for hassle-free property rentals. Explore a diverse range of properties tailored to your needs, from luxurious apartments to cozy homes and commercial spaces. Our user-friendly interface makes finding your ideal rental a breeze. Whether you're a tenant or a property owner, E-Rent is your one-stop solution for seamless transactions. Experience convenience and efficiency in the world of property rentals with E-Rent.</p>
                        <a href="#Landlords-details-focus" class="client-header-link inline-block">
                            <div class="client-btn_text" style="color: rgb(40, 36, 102);">Learn More</div>
                            <div>
                                <div class="arrow-icon w-embed" style="color: rgb(40, 36, 102);">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.3419 8.96692L8.03312 13.2757L3.72431 8.96692" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12.2427 2.91357L8.00004 7.15621L3.75739 2.91357" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Property Types Banner -->

    <x-tenants.all-property-types />

    <x-users.showing-ads />
    <x-tenants.footer />

</x-users.main.app-layout>