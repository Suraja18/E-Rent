<x-users.main.app-layout>
    <x-slot name="head">
        - FAQs
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('question.index') }}" class="banner-link-for-header"> Tenants Questions</a>
            </li>
        </x-slot>
        <x-slot name="name">View</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('question.index') }}" method="GET">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">Question</x-slot>
                <x-slot name="value">{!! $frequently->question !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Answer</x-slot>
                <x-slot name="value">{!! $frequently->answer !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.ck-imageless>
            <div class="text-center">
                <input type="submit" value="Back To Table" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>