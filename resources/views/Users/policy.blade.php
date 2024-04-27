<x-users.main.app-layout>
    <x-slot name="head">
        - {!! $policy->title !!}
    </x-slot>
    @if(auth()->id())
    <x-tenants.navbar />
    @else
    <x-users.navbar />
    @endif

    <section class="about-banners">
        <div class="container-large">
            <h2>{!! $policy->title !!}</h2>
            <div class="mb-1">
                <div class="req-footers">
                    <span class="color-navy">Date:</span>
                    <span class="color-navy">{!! $policy->created_at->toDateString() !!} ({!! $policy->created_at->diffForHumans() !!})</span>
                </div>
            </div>
            <p>{!! $policy->description !!}</p>
        </div>
    </section>

    @if(auth()->id())
    <x-tenants.footer />
    @else
    <x-users.footer />
    @endif

</x-users.main.app-layout>
    