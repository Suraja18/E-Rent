@php
    if(Route::currentRouteName() == 'user.index')
    {
        $questions = App\Models\Questions::where('type', 'Frequently')->latest()->take(5)->get();
    }
    else {
        $questions = App\Models\Questions::where('type', 'Frequently')->latest()->get();
    }   
    $qn = 1;
@endphp
<!-- Start Frequently Asked Question -->
<section class="FAQS">
    <div class="container p5">
        <h2 class="text-center mb-1">Answers to Frequently Asked
            Questions</h2>
        <div class="FAQS-container">
            <div class="FAQS-container-animate">
                <div class="text-left" role="Questions">
                    @foreach ($questions as $question)
                    <div class="Faqs-contents">
                        <div id="questionTitle" data-tab="{!! $qn !!}"
                            class="FAQS-title-question" role="question"
                            aria-labelledby="questionAnswer">
                            <span class="question-plus-icon">
                                <span
                                    class="Question-toggle-closed"><img
                                        src="{!! asset('Images/Original/Icons/plus.svg') !!}"
                                        alt="PlusIcon"></span>
                                <span class="Question-toggle-open"><img
                                        src="{!! asset('Images/Original/Icons/minus.svg') !!}"
                                        alt="MinusIcon"></span>
                            </span>
                            <a class="Question-toggle-title">{!! $question->question !!}</a>
                        </div>
                        <div id="questionAnswer"
                            class="question-content-answer" data-tab="{!! $qn !!}"
                            role="answer"
                            aria-labelledby="questionTitle">
                            {!! $question->answer !!}
                        </div>
                    </div>
                        @php
                            $qn++
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Frequently Asked Question -->