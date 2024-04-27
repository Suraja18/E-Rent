<x-users.main.app-layout>
    <x-slot name="head">
        - Policy
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{!! route('policy.index') !!}" class="banner-link-for-header"> All Policy</a>
            </li>
        </x-slot>
        <x-slot name="name">View</x-slot>
    </x-admin.banners>

    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('policy.index') }}" method="GET">
            @csrf
            <div class="admin">
                <h4 class="mb-1">Title</h4>
                <input placeholder="Write title here..." name="title" value="{!! $policy->title !!}" class="form-control" readonly />
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $policy->description !!}</x-slot> 
            </x-common.ck-imageless>

            <div class="text-center">
                <input type="submit" value="Back to Table" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />
</x-users.main.app-layout>