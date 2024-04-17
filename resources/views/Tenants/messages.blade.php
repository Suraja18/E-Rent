<x-users.main.app-layout>
    <x-slot name="head">
        - Message
    </x-slot>
    <x-tenants.navbar />
    <div class="card-dashboard chat-msg" style="overflow: hidden">
        <div class="p-r d-flex p-0">
            <div class="chat-sidebar show">
                <div class="contacts-list p-r">
                    <div class="simple-wrapper">
                        <div class="simple-mask">
                            <div class="simple-mask edit">
                                <div class="simple-content-wrapper">
                                    <div class="simple-content p-0">
                                        <div class="simple-nav" role="list">
                                            @forelse($messages->sortByDesc('created_at')->groupBy('friend_id') as $friendId => $messagesGroup)
                                                @php
                                                    $requiredFields = [
                                                        'first_name',
                                                        'last_name',
                                                        'phone_number',
                                                        'email',
                                                        'image',
                                                        'address',
                                                        'gender',
                                                    ];
                                                    $profileIncomplete = false;
                                                    foreach ($requiredFields as $field) {
                                                        if (empty($messagesGroup[0]->friend->user->$field)) {
                                                            $profileIncomplete = true;
                                                            break;
                                                        } elseif (empty($messagesGroup[0]->friend->sentBy->$field)) {
                                                            $profileIncomplete = true;
                                                            break;
                                                        }
                                                    }
                                                    $hasUnreadMessage = false;
                                                    foreach ($messagesGroup as $message) {
                                                        if ($message->read_at == null && $message->sent_by != auth()->id()) {
                                                            $hasUnreadMessage = true;
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                @if (!$profileIncomplete)
                                                    <div class="chat-contact {!! $loop->first ? 'active' : '' !!}" data-chat="chat-{!! $messagesGroup[0]->friend->id !!}">
                                                        <div class="d-flex @if($hasUnreadMessage) unread-mg @endif" style="padding: 1rem">
                                                            <div class="avatar-img status">
                                                                <img src="@if($messagesGroup[0]->friend->user->id == auth()->id()) {!! asset($messagesGroup[0]->friend->sentBy->image) !!} @else{!! asset($messagesGroup[0]->friend->user->image) !!} @endif">
                                                            </div>
                                                            <div class="nav-flex d-b p-r">
                                                                <div class="d-flex chat-mg" style="justify-content: space-between">
                                                                    <h6 class="mb-0">@if($messagesGroup[0]->friend->user->id == auth()->id()){!! $messagesGroup[0]->friend->sentBy->first_name !!} {!! $messagesGroup[0]->friend->sentBy->last_name !!} @else {!! $messagesGroup[0]->friend->sentBy->first_name !!} {!! $messagesGroup[0]->friend->sentBy->last_name !!} @endif</h6>
                                                                    <span class="message-time">{!! $messagesGroup[0]->created_at->format('D') !!}</span>
                                                                </div>
                                                                <div>
                                                                    <div class="chat-contact-content">@if($messagesGroup[0]->sent_by == auth()->id())You: {!! \Illuminate\Support\Str::limit($messagesGroup[0]->message, 25, '...') !!} @else {!! \Illuminate\Support\Str::limit($messagesGroup[0]->message, 29, '...') !!} @endif</div>
                                                                    @if($messagesGroup[0]->sent_by == auth()->id())
                                                                    <div class="chat-sent">
                                                                        <svg class="svg-inline-fa @if($messagesGroup[0]->read_at != null) text-success @endif" data-fa-transform="shrink-5 down-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.75em;"><g transform="translate(256 256)"><g transform="translate(0, 128)  scale(0.6875, 0.6875)  rotate(0 0 0)"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" transform="translate(-256 -256)"></path></g></g></svg>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                                <div class="chat-contact">No Contacts</div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simple-placeholder"></div>
                    </div>
                </div>
            </div>

            <div class="chat-content-tab">
                @if($messages->isNotEmpty())
                    @foreach($messages->sortByDesc('created_at')->groupBy('friend_id') as $friendId => $friendMessages)
                    <div class="tab-pane card-chat-pane {!! $loop->first ? 'active' : '' !!}" id="chat-{!! $friendMessages[0]->friend_id !!}">
                        <div class="chat-content-header">
                            <div class="row sidebar-content-wrapper align-center">
                                <div class="chat-headers">
                                    <button type="button" class="back-chat">
                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
                                    </button>
                                    <div>
                                        <h5 class="mb-0">
                                            @if($friendMessages[0]->sender->id == auth()->id())
                                                @if($friendMessages[0]->friend->user_id != auth()->id())
                                                    {!! ($friendMessages[0]->friend->user->first_name) !!} {!! ($friendMessages[0]->friend->user->last_name) !!}
                                                @else
                                                    {!! ($friendMessages[0]->friend->sentBy->first_name) !!} {!! ($friendMessages[0]->friend->sentBy->last_name) !!}
                                                @endif
                                            @else
                                                {!! ($friendMessages[0]->sender->first_name) !!} {!! ($friendMessages[0]->sender->last_name) !!}
                                            @endif
                                        </h5>
                                        <div class="message-time" style="margin-top:4px">On Chat</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-content-body is-ten">
                            <div class="chat-content-scroll" id="chat-content-scroll-{!! $friendMessages[0]->friend_id !!}">
                                <div class="chat-up">
                                    <div class="avatar-img status" style="height:3.5rem; width:3.5rem;">
                                        @if($friendMessages[0]->sender->id == auth()->id())
                                            @if($friendMessages[0]->friend->user_id != auth()->id())
                                                <img src="{!! asset($friendMessages[0]->friend->user->image) !!}">
                                            @else
                                                <img src="{!! asset($friendMessages[0]->friend->sentBy->image) !!}">
                                            @endif
                                        @else
                                            <img src="{!! asset($friendMessages[0]->sender->image) !!}">
                                        @endif
                                    </div>
                                    <div style="flex: 1; margin-left:1rem;">
                                        <h6 class="mb-0">
                                            <a class="head-title-chat">
                                                @if($friendMessages[0]->sender->id == auth()->id())
                                                    @if($friendMessages[0]->friend->user_id != auth()->id())
                                                        {!! ($friendMessages[0]->friend->user->first_name) !!} {!! ($friendMessages[0]->friend->user->last_name) !!}
                                                    @else
                                                        {!! ($friendMessages[0]->friend->sentBy->first_name) !!} {!! ($friendMessages[0]->friend->sentBy->last_name) !!}
                                                    @endif
                                                @else
                                                    {!! ($friendMessages[0]->sender->first_name) !!} {!! ($friendMessages[0]->sender->last_name) !!}
                                                @endif
                                            </a>
                                        </h6>
                                        <p class="mb-0" style="margin-top: 0;">You are friends with 
                                            @if($friendMessages[0]->sender->id == auth()->id())
                                                @if($friendMessages[0]->friend->user_id != auth()->id())
                                                    {!! ($friendMessages[0]->friend->user->first_name) !!} {!! ($friendMessages[0]->friend->user->last_name) !!}
                                                @else
                                                    {!! ($friendMessages[0]->friend->sentBy->first_name) !!} {!! ($friendMessages[0]->friend->sentBy->last_name) !!}
                                                @endif
                                            @else
                                                {!! ($friendMessages[0]->sender->first_name) !!} {!! ($friendMessages[0]->sender->last_name) !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                @forelse ($friendMessages->sortBy('created_at') as $message)
                                    @if($message->sent_by == auth()->id())
                                        <div class="d-flex chat-mg msg" style="padding: .25rem;">
                                            <div class="chat-mg" style="flex: 1; justify-content: flex-end ;">
                                                <div class="hover-effect" style="width:100%">
                                                    <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                                        <div class="chat-message bg-msg-online">
                                                            {!! $message->message !!}
                                                        </div>
                                                        <ul class="hover-action icons-on-hover" data-message-id="{!! $message->id !!}">
                                                            <li class="list-inline-item">
                                                                <a class="icon-color" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                                    <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                                        <svg class="svg-inline-fa @if($message->read_at != null)text-success @endif svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                                        <span>{!! $message->created_at->format('F j, h:i A') !!}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="d-flex chat-mg msg" style="padding: .25rem;">
                                            <div class="avatar-img status" style="height:2rem; width:2rem;">
                                                <img src="{!! asset($message->sender->image) !!}" alt="">
                                            </div>
                                            <div style="flex: 1; margin-left:.75rem;">
                                                <div class="hover-effect">
                                                    <div class="p-r d-flex ">
                                                        <div class="chat-message bg-msg">{!! $message->message !!}</div>
                                                        <ul class="hover-action icons-on-hover" data-message-id="{!! $message->id !!}">
                                                            <li class="list-inline-item">
                                                                <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                                    <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="message-time"><span>{!! $message->created_at->format('F j, h:i A') !!}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="text-center">
                                        <span class="message-time">Start Conservation by saying "Hi"</span>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

                <div class="chat-editor-area">
                    <input type="text" name="message" id="messageInput" class="write-message" placeholder = "Write a message..." required />
                    <button class="btn-send" id="btnSend">Send</button>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $('.chat-contact').click(function() {
            var chatSidebar = document.querySelector('.chat-sidebar');
            chatSidebar.classList.remove('show');
            $('.chat-contact').removeClass('active');
            $(this).addClass('active');
            var chatId = $(this).data('chat');
            $('.chat-content-tab .tab-pane').removeClass('active');
            $('#' + chatId).addClass('active');
            var friendId = $('.chat-contact.active').data('chat').split('-')[1];
            var chatContentScroll = document.getElementById('chat-content-scroll-' + friendId);
            chatContentScroll.scrollTop = chatContentScroll.scrollHeight;
            $.ajax({
                type: 'POST',
                url: '{{ route("tenant.mark_messages_as_read") }}',
                data: {
                    friend_id: friendId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    $(document).ready(function() {
        $('#btnSend').click(function() {
            var friendId = $('.chat-contact.active').data('chat').split('-')[1];
            var message = $('#messageInput').val();
            
            $.ajax({
                type: 'POST',
                url: "{!! route('tenant.sendMessages') !!}",
                data: {
                    friend_id: friendId,
                    message: message,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    var friendId = $('.chat-contact.active').data('chat').split('-')[1];
    var chatContentScroll = document.getElementById('chat-content-scroll-' + friendId);
    chatContentScroll.scrollTop = chatContentScroll.scrollHeight;

    $('.hover-action.icons-on-hover').on('click', 'li.list-inline-item a.icon-color', function(e) {
        e.preventDefault();
        var messageId = $(this).closest('.hover-action.icons-on-hover').data('message-id');
        $.ajax({
            type: 'POST',
            url: '{!! route('tenant.message.delete') !!}',
            data: {
                message_id: messageId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                $(this).closest('.d-flex.chat-mg.msg').remove();
            }.bind(this),
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var backButtonList = document.querySelectorAll('.back-chat');   
        var chatSidebar = document.querySelector('.chat-sidebar');
        backButtonList.forEach(function(backButton) {
            backButton.addEventListener('click', function() {
                chatSidebar.classList.toggle('show');
            });
        });
    });
</script>




</x-users.main.app-layout>