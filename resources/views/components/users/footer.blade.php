@php
    $company = App\Models\Company::first();
@endphp
<!-- Start Footer -->
<footer class="footer-user">
    <div class="footer-width mt-2">
        <div class="footer-top">
            <div class="footer-top-left">
                <a href="{{ route('user.index') }}" class="footer_logo inline-block">
                    <img height="24" src="{!! asset($company->logo) !!}" loading="lazy" alt="Logo">
                </a>
                <div class="text-testimonial footer-tagline">Multifamily
                    Solutions to Rent Property</div>
            </div>
            <div class="footer-top-right">
                <a href="{!! $company->linkedin !!}" target="_blank" class="social_btn inline-block">
                    <img src="{!! asset('Images/Original/Icons/linkedIn.svg') !!}" loading="lazy" alt class="social_icon">
                </a>
                <a href="{!! $company->facebook !!}" target="_blank" class="social_btn inline-block">
                    <img src="{!! asset('Images/Original/Icons/facebook.svg') !!}" loading="lazy" alt class="social_icon">
                </a>
                <a href="{!! $company->instagram !!}" target="_blank" class="social_btn inline-block">
                    <img src="{!! asset('Images/Original/Icons/instagram.svg') !!}" loading="lazy" alt class="social_icon">
                </a>
                <a href="{!! $company->twitter !!}" target="_blank" class="social_btn last inline-block">
                    <img src="{!! asset('Images/Original/Icons/twitter.svg') !!}" loading="lazy" alt class="social_icon">
                </a>
            </div>
        </div>
    </div>
    <div class="footer-width ptb-1">
        <div class="footer-middle-part footer-grid">
            <!-- For left one -->
            <div class="hero-content">
                <div class="hero-content">
                    <a href="{{ route('user.index') }}" class="footer-link header">Home</a>
                </div>
                <div class="hero-content">
                    <a href="{{ route('user.about') }}" class="footer-link header">About</a>
                </div>
            </div>
            <!-- For Middle one -->
            <div class="hero-content">
                <div class="hero-content">
                    <div class="footer-link header">Use Cases</div>
                    <a href="{{ route('user.use-case') }}" class="footer-link">Tenants</a>
                    <a href="#" class="footer-link">Landlord</a>
                </div>
            </div>
            <!-- For Middle two -->
            <div class="hero-content">
                <div class="hero-content">
                    <div class="footer-link header">Features</div>
                    <a href="{{ route('user.user-role') }}" class="footer-link">Roles</a>
                    <a href="{{ route('user.press-media') }}" class="footer-link">Press & Media</a>
                    <a href="{{ route('user.faqs') }}" class="footer-link">FAQs</a>
                </div>
            </div>
            <!-- Last One -->
            <div class="hero-content fd-row">
                <div>
                    <div class="footer-link header">Company</div>
                    <a href="{{ route('user.about') }}" class="footer-link">Why HappyCo?</a>
                    <a href="{{ route('user.contact') }}" class="footer-link">Contact Us</a>
                </div>
            </div>
            <!-- Finish of Grid -->
        </div>
    </div>
    <div class="footer-divider"></div>
    <div class="footer-width">
        <div class="footer-middle-part grid">
            <div id="footerNode" class="footerNode ptb-2">
                <div class="footer_date w-embed">
                    © E-Rent
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </div>
                <a href="/Errors/404Error.html" class="footer-link sublink mr-2">Terms of
                    Use</a>
                <a href="/Errors/404Error.html" class="footer-link sublink mr-2">Privacy
                    Policy</a>
                <a href="/Errors/404Error.html" class="footer-link sublink mr-2">Cookie
                    Policy</a>
            </div>
            <div id="footerNode-end">
                <p class="footer-text-end">Manage happier properties
                    with <strong>E-Rent</strong></p>
                <a href="{{ route('user.login') }}" class="btnPrimary navButton">Login</a>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
