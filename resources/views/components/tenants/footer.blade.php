@php
    $company = App\Models\Company::first();
@endphp
<!-- Start Footer -->
<footer class="footer-user">
    <div class="footer-width mt-2">
        <div class="footer-top">
            <div class="footer-top-left">
                <a href="{{ route('tenant.dashboard') }}" class="footer_logo inline-block">
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
                    <a href="{{ route('tenant.dashboard') }}" class="footer-link header">Home</a>
                </div>
                <div class="hero-content">
                    <a href="{{ route('tenant.about') }}" class="footer-link header">About</a>
                </div>
            </div>
            <!-- For Middle one -->
            <div class="hero-content">
                <div class="hero-content">
                    <div class="footer-link header">Property</div>
                    <a href="{{ route('tenant.property-types') }}" class="footer-link">Property Type</a>
                    <a href="{{ route('tenant.landlord') }}" class="footer-link">Landlord</a>
                    <a href="{{ route('tenant.property-list') }}" class="footer-link">Buildingd</a>
                </div>
            </div>
            <!-- For Middle two -->
            <div class="hero-content">
                <div class="hero-content">
                    <div class="footer-link header">Features</div>
                    <a href="{{ route('tenant.landlord-forum') }}" class="footer-link">Landlond Forum</a>
                    <a href="{{ route('tenant.press-media') }}" class="footer-link">Press & Media</a>
                    <a href="{{ route('tenant.customer-review') }}" class="footer-link">Customer Review</a>
                </div>
            </div>
            <!-- Last One -->
            <div class="hero-content fd-row">
                <div>
                    <div class="footer-link header">Company</div>
                    <a href="{{ route('tenant.about') }}" class="footer-link">Why HappyCo?</a>
                    <a href="{{ route('tenant.contact') }}" class="footer-link">Contact Us</a>
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
                <p class="footer-text-end">Manage properties
                    with <strong>E-Rent</strong></p>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<script>
    $(document).ready(function () {
        $('.notification-tags').click(function (e) {
            e.preventDefault();
            var notificationId = $(this).data('notification-id');
            var url = "{{ route('tenant.mark.notification.read', ':id') }}".replace(':id', notificationId);
            var targetUrl = $(this).attr('href');

            $.ajax({
                type: 'POST',
                url: url,
                data: {_token: '{{ csrf_token() }}'},
                success: function (response) {
                    // Remove the clicked notification from the list
                    $(e.target).closest('li').remove();
                    window.location.href = targetUrl;
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
    $(document).ready(function() {
        $('.add-friend').on('click', function() {
            var friendId = $(this).data('friend-id');
            $.ajax({
                type: 'POST',
                url: '{!! route('user.addFriend') !!}',
                data: {
                    friend_id: friendId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('.add-friend[data-friend-id="' + friendId + '"]').hide();
                    $('.is-button-for-edit-profile[data-friend-id="' + friendId + '"]').show();
                }
            });
        });
    });
</script>