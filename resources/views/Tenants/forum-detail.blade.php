<x-users.main.app-layout>
    <x-slot name="head">
        - {!! $forum->heading !!}
    </x-slot>
    <x-tenants.navbar />
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
            <div class="text-center">
                <a onclick="window.print(); return false;" class="btn btnPrimary">
                    Print 
                </a>
                <a href="{!! route('forum.generatePDF', $forum->slug) !!}" class="btn btnPrimary">
                    Download 
                </a>
            </div>
        <img width="307" height="616" src="{!! asset('Images/Original/Request/leftcirclebackground.svg') !!}" alt="background" class="use-case-image-responsive is-background">
    </section>

    <x-tenants.universal-landlord-forum />

    <x-tenants.footer />
</x-users.main.app-layout>
    