<x-users.main.app-layout>
    <x-slot name="head">
        - All Contact
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('admin.contact.index') }}" class="banner-link-for-header"> All Contact</a>
            </li>
        </x-slot>
        <x-slot name="name">View</x-slot>
    </x-admin.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('admin.email.send.id', $contact->email) }}" method="GET">
            @csrf
            <x-common.input-text-100>
                <x-slot name="column">User Name</x-slot>
                <x-slot name="value">{!! $contact->first_name !!} {!! $contact->last_name !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.input-text-100>
                <x-slot name="column">Email</x-slot>
                <x-slot name="value">{!! $contact->email !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.input-text-100>
            <x-common.ck-imageless>
                <x-slot name="column">Message</x-slot>
                <x-slot name="value">{!! $contact->message !!}</x-slot> 
                <x-slot name="type">{!! $type !!}</x-slot>
            </x-common.ck-imageless>
            <div class="admin">
                <div class="flec-centre">
                    <input type="checkbox" class="checkbtn" id="checkbtn-{!! $contact->id !!}" name="status" data-id="{{ $contact->id }}" @if($contact->read == 1) checked @endif>
                    <label for="checkbtn-{!! $contact->id !!}" class="toggle-btn"></label>
                </div>
            </div>
            <div class="mb-1">
                <div class="req-footers">
                    <span class="color-navy">Received on</span>
                    <span class="color-navy">{!! $contact->created_at->toDateString() !!} ({!! $contact->created_at->diffForHumans() !!})</span>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" value="Send Email" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>
    <script>
        $(document).ready(function(){
            $('.checkbtn').change(function() {
                var status = $(this).is(':checked') ? 1 : 0;
                var contactId = $(this).data('id'); 
        
                $.ajax({
                    url: "{!! route('contact.read') !!}",
                    type: 'POST',
                    data: {
                        id: contactId,
                        read: status,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'An error occurred: ' + xhr.statusText,
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>
    <x-landlords.footer />  
</x-users.main.app-layout>