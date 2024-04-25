<x-users.main.app-layout>
    <x-slot name="head">
        - Use Case
    </x-slot>
    <x-users.navbar />

       <!-- Start Banners -->
       <section class="p-r">
        <div class="tenant-use-case-container">
            <section class="use-case-page-header" style="background-image: url(../Images/Original/Request/tenants-banners.jpg)">
                <div class="use-case-containers">
                    <div class="use-case-rows">
                        <div class="use-case-wrap wrap-75">
                            <div>
                                <span class="use-case-header">For {!! $role->user_roles !!}</span>
                                <h1 class="use-case-heading"><strong>Process in E-Rent is easy & stress-free</strong></h1>
                                <p class="use-case-paragraph">{!! $role->roles !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="p-r not-mobile">
                <div class="use-case-containers">
                    <div class="use-case-rows">
                        <div class="use-case-wrap">
                            <div class="m-0">
                                <div class="text-center">
                                    <div class="use-case-wrappers">
                                        <ul class="use-case-lists" role="list">
                                            @foreach ($cases as $case)
                                            <a href="#{{ $role->slug }}-{{ $loop->index }}" class="use-cases-lists use-case-listitem {{ $loop->first ? 'active' : '' }}" role="listitem" onclick="setActive(this)">
                                                {!! $case->heading !!}
                                            </a>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @foreach ($cases as $case)
            <section class="p-r pay-rent" id="{!! $role->slug !!}-{{ $loop->index }}">
                <div class="use-case-containers plr-4">
                    <div class="use-case-rows">
                        <div class="use-case-wrap wrap-75">
                            <div class="use-case-section-inner">
                                <h2 class="use-case-section-title">{!! $case->heading !!}</h2>
                                <p class="use-case-section-description">{!! $case->description !!}</p>
                            </div>
                        </div>
                        @php
                            $casesdescs = App\Models\CaseDescription::where('case_id', $case->id)->latest()->get();
                        @endphp
                        @foreach ($casesdescs as  $desc)
                        <div class="use-case-wrap wrap-37">
                            <div class="use-case-wrap-section-features">
                                <div class="use-case-feature-image-container">
                                    <img src="{!! asset($desc->icon) !!}" alt="{!! $desc->heading !!}" class="use-case-feature-image">
                                </div>
                                <h3 class="use-case-feature-header">
                                    {!! $desc->heading !!}
                                </h3>
                                <p class="use-case-feature-paragraph">
                                    {!! $desc->description !!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </section>
            @endforeach
           

        </div>
    </section>
    <!-- End Banners -->
    <x-users.footer />
    <script>
        function setActive(element) {
            document.querySelectorAll('.use-case-listitem').forEach(function(el) {
                el.classList.remove('active');
            });
            element.classList.add('active');
            const target = document.querySelector(element.getAttribute('href'));
        }
    </script>
        
</x-users.main.app-layout>
    