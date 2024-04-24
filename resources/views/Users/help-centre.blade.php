@php
    $users = App\Models\userRoles::latest()->get();
@endphp
<x-users.main.app-layout>
    <x-slot name="head">
        - Help Centre
    </x-slot>
    <x-users.navbar />

            <!-- Start Banners -->
            <section class="p-r">
                <div class="use-case-containers">
                    <div class="use-case-all-contain">
                        <h1 class="use-case-section-title">Help Center</h1>
                        <p class="help-center-paragraph">See how to use system on our Help Center</p>
                        <div>
                            <div class="help-center-select">
                                <div class="help-center-upper-section">
                                    <div class="use-case-wrappers">
                                        <div class="help-center-wrap">
                                            @foreach ($users as $user)
                                            <span class="help-center-item" role="listitem">
                                                <input type="radio" name="role" id="{!! $user->slug !!}Role" autocomplete="off" {{ $loop->first ? 'checked' : '' }}>
                                                <label for="{!! $user->slug !!}Role" class="m-button btn-role-help">{!! $user->user_roles !!}</label>
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex others-help">
                                    @foreach ($users as $user)
                                    <section id="{!! $user->slug !!}HelpCenter" class="{{ $loop->first ? 'active' : '' }}">
                                        <div class="use-case-containers text-left">
                                            <div class="help-center-qn-header">Get Started | {!! $user->user_roles !!}</div>
                                            <div class="help-breadcrumb">
                                                <span class="breadcrumb-paragraph-help">Help Center /</span>
                                                <span class="breadcrumb-paragraph-help">{!! $user->user_roles !!}</span>
                                            </div>
                                            <div class="use-case-rows">
                                                <div class="use-case-wrap">
                                                    <div>
                                                        @php
                                                            $questions = App\Models\HelpCentre::where('role_id', $user->id)->get();
                                                        @endphp
                                                        <h2 class="help-center-ask-qn">How to begin</h2>
                                                        <ul class="no-gaps">
                                                            @foreach ($questions as $question)
                                                            <li class="ask-qn-list-item">
                                                                <a href="{!! route('user.help.centre.find', ['userSlug' => $question->userRole->slug, 'slug' => $question->slug]) !!}" class="text-qn">{!! $question->question !!}</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    @endforeach
                                    
                                </div>
                                
    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="help-center top-header-bg">
                    <img src="{!! asset('Images/Original/Request/header-bg.svg') !!}" alt="Header Bg">
                </div>
                <div class="help-center header-top-bg">
                    <img src="{!! asset('Images/Original/Request/circle-bg.svg') !!}" alt="Circle-bg">
                </div>
            </section>
            <!-- End Banners -->

    <x-users.footer />
</x-users.main.app-layout>
    