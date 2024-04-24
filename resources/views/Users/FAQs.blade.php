<x-users.main.app-layout>
    <x-slot name="head">
        - FAQs
    </x-slot>
    <x-users.navbar />
    <!-- Start FAQs Banner -->
    <section class="clientSays bg-blue-lighter pt-7b">
        <div class="property-wrappers">
            <div class="container is-header">
                <div class="hero-content housing-content-center">
                    <div class="hero-content housing-content-center housing-detail">
                        <img src="{!! asset('Images/Original/Icons/faqs.sv') !!}"" alt="Logo" loading="lazy">
                        <h1 class="banner-header">Your E-Rent is always by your side</h1>
                        <p class="text-testimonial text-center">Most of the Newly Owned Customers have questions related to our Website. Some of mostly asked question with their solution listed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQs Banner -->

    <x-users.faqs />
    @php
         $questions = App\Models\Questions::where('type', 'Tenant')->latest()->get();
         $qn = 1;
    @endphp

    <!-- Start Most Clients FAQs -->
    <section class="clientSays bg-light">
        <div class="c-wrappers pt-7b">
            <div class="hero-content mt-5r">
                <div class="hero-content mb-3 text-center">
                    <div class="text-navys text-center">
                        Clients FAQs
                    </div>
                    <h3 class="color-navy">You have questions, we have answers.</h3>
                </div>
                <div>
                    <!-- Start Loop -->
                    @foreach ($questions as $question)
                    <div class="question-wrappers dropdown-ans">
                        <div class="question-wrap dropdown-answer" role="button" id="question-{!! $qn !!}" aria-expanded="false" onclick="toggleAnswer(this)">
                            <div class="question-wrap-questions">
                                <div class="question-wrap-text">
                                    <div class="heading-xS">{!! $question->question !!}</div>
                                </div>
                            </div>
                            <div class="question-wrap-arrow">
                                <img src="{!! asset('Images/Original/downArrow.svg') !!}" alt="Expand Arrow" loading="lazy" class="arrowDown">
                            </div>
                        </div>
                        <div class="question-answers dropdown-lists" id="answer-{!! $qn !!}">
                            <div class="question-contents">
                                <div class="question-content">
                                    <p>{!! $question->answer !!}</p>
                                </div>
                                @php
                                    $qn++;
                                @endphp
                            </div>
                        </div>
                    </div> 
                    @endforeach
                    
                    <!-- End Loop -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Most Clients FAQs -->

    <x-users.showing-ads />

    <x-slot name="scripts">
        <script>
            function toggleAnswer(element) {
                var arrow = element.querySelector('.arrowDown');
                var questionId = element.id;
                var answerId = questionId.replace('question', 'answer');
                var answers = document.getElementById(answerId);
        
                if (arrow && answers) {
                    arrow.classList.toggle('rotate180');
                    answers.classList.toggle('open');
                }
            }
        </script>
    </x-slot>
    <x-users.footer />
</x-users.main.app-layout>