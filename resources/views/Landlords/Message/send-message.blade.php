<x-users.main.app-layout>
    <x-slot name="head">
        - Message
    </x-slot>
    <div id="messageLandlord">
        <x-landlords.sidebar />

        <x-landlords.navbar />
    
            <section id="messages" class="p-r">
                <div class="pr-info-container">
                    <div class="p-r">
                        <div class="chat-container">
                            <div class="msg-sidebar show">
                                <div class="msg-sidebar-wrapper">
                                    <div>
                                        <div class="msg-sidebar-container">
                                            <div class="msg-sidebar-wrapper" style="flex-direction: column;">
                                                <div class="d-flex">
                                                    <div class="msg-sb">
                                                        <div class="msg-sb-cont">
                                                            <div class="p-r" role="list">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($messages->isNotEmpty())
                                @foreach($messages->sortByDesc('created_at')->groupBy('friend_id') as $friendId => $friendMessages)
                                    <div class="msg-body {!! $loop->first ? 'active' : '' !!} " id="chat-{!! $friendMessages[0]->friend_id !!}">
                                        <div class="msg-sb">
                                            <div class="messa">
                                                <div class="message-container">
                                                    <div class="d-flex messa">
                                                        <div class="message-wrapper">
                                                            <div class="messa">
                                                                <div>
                                                                    <div class="p-r">
                                                                        <div class="message-head">
                                                                            <div class="p-r messa other">
                                                                                <div class="top-message-head">
                                                                                    <div class="messa conat">
                                                                                        <div class="system-head">
                                                                                            
                                                                                            <div class="chat-up">
                                                                                                <button type="button" class="back-chat">
                                                                                                    <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
                                                                                                </button>
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
                                                                                                        <div class="head-title-chat">
                                                                                                            @if($friendMessages[0]->sender->id == auth()->id())
                                                                                                                @if($friendMessages[0]->friend->user_id != auth()->id())
                                                                                                                    {!! ($friendMessages[0]->friend->user->first_name) !!} {!! ($friendMessages[0]->friend->user->last_name) !!}
                                                                                                                @else
                                                                                                                    {!! ($friendMessages[0]->friend->sentBy->first_name) !!} {!! ($friendMessages[0]->friend->sentBy->last_name) !!}
                                                                                                                @endif
                                                                                                            @else
                                                                                                                {!! ($friendMessages[0]->sender->first_name) !!} {!! ($friendMessages[0]->sender->last_name) !!}
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </h6>
                                                                                                    <p class="mb-0" style="margin-top: 0;">On Chat</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="msg-sb-cont max" id="chat-content-scroll-{!! $friendMessages[0]->friend_id !!}">
                                                                        <div>
                                                                            <div class="p-r">
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
                                                                    <div>
                                                                        <div class="send-msg">
                                                                            <div class="p-r">
                                                                                <div class="d-flex">
                                                                                    <div class="msg-chat p-r">
                                                                                        <input type="text" id="messageInput" class="chat-mess" placeholder="Aa" />
                                                                                    </div>
                                                                                    <button type="button" class="msg-send-svg b-e-0 btnSend" id="btnSend">
                                                                                        <svg height="20px" viewBox="0 0 24 24" width="20px"><title>Press enter to send</title><path d="M16.6915026,12.4744748 L3.50612381,13.2599618 C3.19218622,13.2599618 3.03521743,13.4170592 3.03521743,13.5741566 L1.15159189,20.0151496 C0.8376543,20.8006365 0.99,21.89 1.77946707,22.52 C2.41,22.99 3.50612381,23.1 4.13399899,22.8429026 L21.714504,14.0454487 C22.6563168,13.5741566 23.1272231,12.6315722 22.9702544,11.6889879 C22.8132856,11.0605983 22.3423792,10.4322088 21.714504,10.118014 L4.13399899,1.16346272 C3.34915502,0.9 2.40734225,1.00636533 1.77946707,1.4776575 C0.994623095,2.10604706 0.8376543,3.0486314 1.15159189,3.99121575 L3.03521743,10.4322088 C3.03521743,10.5893061 3.34915502,10.7464035 3.50612381,10.7464035 L16.6915026,11.5318905 C16.6915026,11.5318905 17.1624089,11.5318905 17.1624089,12.0031827 C17.1624089,12.4744748 16.6915026,12.4744748 16.6915026,12.4744748 Z" fill="var(--chat-composer-button-color)"></path></svg>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        
        
        </section>
        </div>
        </div>
        </div>
        </div>
        </div>       
        </div>
        </section>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('.chat-contact').click(function() {
            var chatSidebar = document.querySelector('.msg-sidebar');
            chatSidebar.classList.remove('show');
            $('.chat-contact').removeClass('active');
            $(this).addClass('active');
            var chatId = $(this).data('chat');
            $('.msg-body').removeClass('active');
            $('#' + chatId).addClass('active');
            var friendId = $('.chat-contact.active').data('chat').split('-')[1];
            var chatContentScroll = document.getElementById('chat-content-scroll-' + friendId);
            chatContentScroll.scrollTop = chatContentScroll.scrollHeight;
            $.ajax({
                type: 'POST',
                url: '{{ route("landlord.mark_messages_as_read") }}',
                data: {
                    friend_id: friendId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                   //
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    $(document).ready(function() {
        $('.chat-container').on('click', '.btnSend', function() {
            var messageBox = $(this).closest('.send-msg').find('.chat-mess');
            var friendId = $('.chat-contact.active').data('chat').split('-')[1];
            var message = messageBox.val();

            $.ajax({
                type: 'POST',
                url: "{!! route('landlord.sendMessages') !!}",
                data: {
                    friend_id: friendId,
                    message: message,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
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
            url: '{!! route('landlord.message.delete') !!}',
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
    $(document).on('click', '.back-chat', function() {
        var chatSidebar = document.querySelector('.msg-sidebar');
        chatSidebar.classList.toggle('show');
    });
    function adjustMaxHeight() {
            const container = document.querySelector('.msg-sb-cont.max');
            if (!container) return;

            let screenHeight = window.innerHeight;
            if (screenHeight < 700) {
                container.style.maxHeight = '45vh';
            } else if (screenHeight < 800) {
                container.style.maxHeight = '53vh';
            } else {
                container.style.maxHeight = '55vh';
            }
        }

        window.addEventListener('resize', adjustMaxHeight);
        adjustMaxHeight();
</script>
</x-users.main.app-layout>
