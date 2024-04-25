@php
    $roles = App\Models\UseCases::latest()->get();
@endphp
<x-users.main.app-layout>
    <x-slot name="head">
        - Use Case
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('case.index') }}" class="banner-link-for-header"> Case Description</a>
            </li>
        </x-slot>
        <x-slot name="name">Edit</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('case.update', $case) }}" method="POST">
            @method('PUT')
            @csrf
            <x-common.input-select-100>
                <x-slot name="column">Use Case</x-slot>
                @if (isset($case->case_id ))
                    <x-slot name="type"><option value="{!! $case->useCase->id !!}">{!! $case->useCase->userRole->user_roles !!}/{!! $case->useCase->heading !!}</option></x-slot>
                @endif
                @foreach ($roles as $roling)
                    <option value="{!! $roling->id !!}">{!! $roling->userRole->user_roles !!}/{!! $roling->heading !!}</option>
                @endforeach
            </x-common.input-select-100>
            <x-common.input-image-100>
                <x-slot name="nothing">Nothing</x-slot>
                <x-slot name="image1">{!! asset($case->icon) !!}</x-slot>
            </x-common.input-image-100>
            <x-common.input-text-100>
                <x-slot name="column">Heading</x-slot>
                <x-slot name="value">{!! $case->heading !!}</x-slot> 
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Description</x-slot>
                <x-slot name="value">{!! $case->description !!}</x-slot> 
            </x-common.ck-imageless>
            <div class="text-center">
                <input type="submit" value="Update" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
</x-users.main.app-layout>