@php
    $questions = App\Models\HelpCentre::where('role_id', $question->role_id)->where('id', '!=' ,$question->id)->take(7)->latest()->get();
@endphp
<x-users.main.app-layout>
    <x-slot name="head">
        - Help Centre
    </x-slot>
    <x-users.navbar />

     <!-- Start Banners -->
     <section>
        <div class="use-case-containers">
            <div class="use-case-rows">
                <div class="use-case-wrap wrap-66">
                    <h1 class="help-ans-header">{!! $question->question !!}</h1>
                    <div class="help-breadcrumb">
                        <a href="{!! route('user.helpCentre') !!}" class="breadcrumb-paragraph-help">Help Center /</a>
                        <span class="breadcrumb-paragraph-help">{!! $question->userRole->user_roles !!} /</span>
                        <span class="breadcrumb-paragraph-help">{!! $question->question !!}</span>
                    </div>
                    <div class="text-qn color-navy">
                        <main>
                            <p>{!! $question->answer !!}</p>
                            <p><i>Last Updated<br /> {!! $question->updated_at->format('M j, Y') !!} </i></p>
                        </main>
                    </div>
                </div>
                <div class="use-case-wrap wrap-33">
                    <div class="help-sidebar">
                        <h2 class="help-center-ask-qn no-pad">Related Questions</h2>
                        <ul class="sidebar-lists">
                            @foreach ($questions as $question)
                            <li class="mb-30p p-r">
                                <a href="{!! route('user.help.centre.find', ['userSlug' => $question->userRole->slug, 'slug' => $question->slug]) !!}" class="text-qn color-navy">{!! $question->question !!}</a>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="help-center bg-center">
            <img src="{!! asset('Images/Original/Request/double-circle-bg.svg') !!}" alt="Double Bg">
        </div>
    </section>
    <!-- End Banners -->

    <x-users.footer />
</x-users.main.app-layout>
    