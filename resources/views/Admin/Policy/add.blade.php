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
        <x-slot name="name">Add</x-slot>
    </x-admin.banners>

    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('policy.store') }}" method="POST">
            @csrf
            <div class="admin">
                <h4 class="mb-1">Title</h4>
                <input placeholder="Write title here..." name="title" class="form-control" required />
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
            </x-common.ck-imageless>

            <div class="text-center">
                <input type="submit" value="Add" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />
</x-users.main.app-layout>
