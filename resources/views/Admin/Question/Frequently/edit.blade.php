<x-users.main.app-layout>
    <x-slot name="head">
        - FAQs
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('frequently.index') }}" class="banner-link-for-header"> Frequently Asked Questions</a>
            </li>
        </x-slot>
        <x-slot name="name">Edit</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('frequently.update', $frequently) }}" method="POST">
            @method('PUT')
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Question</x-slot>
                <x-slot name="value">{!! $frequently->question !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Answer</x-slot>
                <x-slot name="value">{!! $frequently->answer !!}</x-slot> 
            </x-common.ck-imageless>
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>