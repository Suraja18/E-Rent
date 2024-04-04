<x-users.main.app-layout>
    <x-slot name="head">
        - {!! $forum->heading !!}
    </x-slot>
    <section class="clientSays bg-blue-lighter pt-7b">
        <div class="property-wrappers">
            <div class="container is-header">
                <div class="use-case-rows">
                    <div class="use-case-wrap">
                        <div class="text-center">
                            <h1 class="banner-header">{!! $forum->heading !!}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-r">
            <div class="use-case-containers">
                <div class="use-case-rows">
                    <div class="use-case-wrap plr-4">
                        {!! $forum->description !!} 
                    </div>
                </div>
            </div>
        <img width="307" height="616" src="{!! asset('Images/Original/Request/leftcirclebackground.svg') !!}" alt="background" class="use-case-image-responsive is-background">
    </section>
</x-users.main.app-layout>
    