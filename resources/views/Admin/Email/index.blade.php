<x-users.main.app-layout>
    <x-slot name="head">
        - Email
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a class="banner-link-for-header"> Email</a>
            </li>
        </x-slot>
        <x-slot name="name">Send Email</x-slot>
    </x-admin.banners>

    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.email.success') }}" method="POST">
            @csrf

            <div class="admin">
                <h4 class="mb-1">Email</h4>
                <input placeholder="Write Email here..." name="email" class="form-control" @if(isset($tenant)) value="{!! $tenant->email !!}" readonly @else required @endif />
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="admin">
                <h4 class="mb-1">Subject</h4>
                <input placeholder="Write Subject here..." name="subject" class="form-control" required />
                @error('subject')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <x-common.ck-imageless>
                <x-slot name="column">Message</x-slot>
            </x-common.ck-imageless>

            <div class="text-center">
                <input type="submit" value="Send" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>

    <x-landlords.footer />
</x-users.main.app-layout>
