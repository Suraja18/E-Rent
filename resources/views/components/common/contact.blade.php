@php
    if(Auth::id()){
        $user = App\Models\User::findOrFail(Illuminate\Support\Facades\Auth::id());
    }
    $company = App\Models\Company::first(); 
@endphp     
    <!-- Contact US Banner -->
    <section class="clientSays bg-blue-lighter pt-7b">
        <div class="property-wrappers">
            <div class="container is-header">
                <div class="hero-content housing-content-center">
                    <div class="hero-content housing-content-center housing-detail">
                        <img src="{!! asset('Images/Original/Icons/contactus.svg') !!}" alt="Logo" loading="lazy">
                        <h1 class="banner-header">Contact Us</h1>
                        <p class="text-testimonial text-center">{!! $company->contact_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact US Banner -->

    <!-- Start Contact Us Section -->
    <section class="contact-us-page">
        <div class="contact-container">
            <div class="row bg-2">
                <div class="hero-content is-mobile" role="listitem">
                    <div class="row bg-2">
                        <div class="search-input-box animate wow fadeIn" role="listitem">
                            <div class="search-wrappers">
                                <div class="contact-icons-wrappers">
                                    <div class="contact-icons">
                                        <img src="{!! asset('Images/Original/Icons/location.svg') !!}" alt="Location">
                                    </div>
                                    <span class="paragraph">{!! $company->address !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="search-input-box animate wow fadeIn" role="listitem">
                            <div class="search-wrappers">
                                <div class="contact-icons-wrappers">
                                    <div class="contact-icons">
                                        <img src="{!! asset('Images/Original/Icons/email.svg') !!}" alt="Email">
                                    </div>
                                    <span class="paragraph">{!! $company->email !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="search-input-box animate wow fadeIn" role="listitem">
                            <div class="search-wrappers">
                                <div class="contact-icons-wrappers">
                                    <div class="contact-icons">
                                        <img src="{!! asset('Images/Original/Icons/phone.svg') !!}" alt="Location">
                                    </div>
                                    <span class="paragraph">
                                        @if (strlen($company->phone_number) == 10)
                                            +977 {{ $company->phone_number }}
                                        @else
                                            {{ $company->phone_number }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-content is-50-mobile wow fadeInUp">
                    <iframe class="google-maps"
                        src="{!! $company->google_map !!}"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="hero-content is-50-mobile bg-white">
                    <div class="wow fadeInUp mt-3 p4r">
                        <h2 class="heading-med">We’re excited to speak with you!</h2>
                        <div class="contact-forms">
                            <form action="@if(isset($routes)) {!! $routes !!} @endif" method="POST">
                                @csrf
                                <div id="form-field-email" class="p-r">
                                    <label for="contactEmail" class="form-field-label">Email*</label>
                                    <input class="form-field-input w-input"
                                        data-bouncer-bus-email-message="Please use your personal email" maxlength="256"
                                        name="email" data-name="email" placeholder="Your email" type="email"
                                        id="contactEmail" @if(isset($user->email)) value="{!! $user->email !!}" readonly @else required @endif>
                                    @error('email')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div id="form-field-name" class="form-field-wrappers">
                                    <div id="form-field-fname" class="form-field-blocks">
                                        <label for="first_name" class="form-field-label">First Name*</label>
                                        <input class="form-field-input w-input" maxlength="256" name="first_name"
                                            data-name="first_name" placeholder="Your first name" type="text"
                                            id="first_name" @if(isset($user->first_name)) value="{!! $user->first_name !!}" readonly @else required @endif>
                                        @error('first_name')
                                            <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div id="form-field-lname" class="form-field-blocks">
                                        <label for="last_name" class="form-field-label">Last Name*</label>
                                        <input class="form-field-input w-input" maxlength="256" name="last_name"
                                            data-name="last_name" placeholder="Your last name" type="text"
                                            id="last_name" @if(isset($user->last_name)) value="{!! $user->last_name !!}" readonly @else required @endif>
                                        @error('last_name')
                                            <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div id="form-field-message" class="p-r">
                                    <label for="contactMessage" class="form-field-label">Message*</label>
                                    <textarea class="form-field-input w-input auto-height" name="message" data-name="message" placeholder="Your Message"
                                        id="contactMessage" required=""></textarea>
                                    @error('message')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="contact-form-buttons">
                                    <input type="submit" data-wait="Please wait..."
                                        class="btnPrimary is--full-width navButton" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Us Section -->
