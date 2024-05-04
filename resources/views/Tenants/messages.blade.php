<x-users.main.app-layout>
    <x-slot name="head">
        - Message
    </x-slot>
    <x-tenants.navbar />
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
                                                        <div>
                                                            <input type="search" id="searchContact" class="form-control" placeholder="Search Contact..." />
                                                        </div>
                                                        @if(isset($messages))
                                                            @foreach($messages->sortByDesc('created_at')->groupBy('friend_id') as $friendId => $messagesGroup)
                                                                @php
                                                                    $hasUnreadMessage = false;
                                                                    foreach ($messagesGroup as $message) {
                                                                        if ($message->read_at == null && $message->sent_by != auth()->id()) {
                                                                            $hasUnreadMessage = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                @endphp
                                                                <div class="chat-contact {!! $loop->first ? 'active' : '' !!}" data-chat="chat-{!! $messagesGroup[0]->friend->id !!}">
                                                                    <div class="d-flex @if($hasUnreadMessage) unread-mg @endif" style="padding: 1rem">
                                                                        <div class="avatar-img @if($messagesGroup[0]->friend->user->id == auth()->id()) @if($messagesGroup[0]->friend->sentBy->active_status == 1) status-online @endif  @else @if($messagesGroup[0]->friend->user->active_status == 1) status-online @endif @endif status">
                                                                            <img src="@if($messagesGroup[0]->friend->user->id == auth()->id()) {!! asset($messagesGroup[0]->friend->sentBy->image) !!} @else{!! asset($messagesGroup[0]->friend->user->image) !!} @endif">
                                                                        </div>
                                                                        <div class="nav-flex d-b p-r">
                                                                            <div class="d-flex chat-mg" style="justify-content: space-between">
                                                                                <h6 class="mb-0">@if($messagesGroup[0]->friend->user->id == auth()->id()){!! $messagesGroup[0]->friend->sentBy->first_name !!} {!! $messagesGroup[0]->friend->sentBy->last_name !!} @else {!! $messagesGroup[0]->friend->user->first_name !!} {!! $messagesGroup[0]->friend->user->last_name !!} @endif</h6>
                                                                                <span class="message-time">{!! $messagesGroup[0]->created_at->format('D') !!}</span>
                                                                            </div>
                                                                            <div>
                                                                                <div class="chat-contact-content">@if($messagesGroup[0]->sent_by == auth()->id())You: @if($messagesGroup[0]->message) {!! \Illuminate\Support\Str::limit($messagesGroup[0]->message, 25, '...') !!} @else Sent a Photo @endif @else @if($messagesGroup[0]->message) {!! \Illuminate\Support\Str::limit($messagesGroup[0]->message, 25, '...') !!} @else Sent a Photo @endif @endif</div>
                                                                                @if($messagesGroup[0]->sent_by == auth()->id())
                                                                                <div class="chat-sent">
                                                                                    <svg class="svg-inline-fa @if($messagesGroup[0]->read_at != null) text-success @endif" data-fa-transform="shrink-5 down-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.75em;"><g transform="translate(256 256)"><g transform="translate(0, 128)  scale(0.6875, 0.6875)  rotate(0 0 0)"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" transform="translate(-256 -256)"></path></g></g></svg>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @if (isset($contacts))
                                                            @foreach ($contacts as $contact)
                                                                <div class="chat-contact @if($messages->isEmpty()) {!! $loop->first ? 'active' : '' !!} @endif" data-chat="chat-{!! $contact->id !!}">
                                                                    <div class="d-flex" style="padding: 1rem">
                                                                        <div class="avatar-img @if($contact->user->id == auth()->id()) @if($contact->sentBy->active_status == 1) status-online @endif  @else @if($contact->user->active_status == 1) status-online @endif @endif status">
                                                                            <img src="@if($contact->user->id == auth()->id()) {!! asset($contact->sentBy->image) !!} @else{!! asset($contact->user->image) !!} @endif">
                                                                        </div>
                                                                        <div class="nav-flex d-b p-r">
                                                                            <div class="d-flex chat-mg" style="justify-content: space-between">
                                                                                <h6 class="mb-0">@if($contact->user->id == auth()->id()){!! $contact->sentBy->first_name !!} {!! $contact->sentBy->last_name !!} @else {!! $contact->user->first_name !!} {!! $contact->user->last_name !!} @endif</h6>
                                                                            </div>
                                                                            <div>
                                                                                <div class="chat-contact-content">Say <b>Hi</b> to your Friends</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @if(!$messages && !$contacts)
                                                            <div class="chat-contact">No Contacts</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(isset($messages) && $messages->isNotEmpty())
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
                                                                                                    @if($message->image)
                                                                                                        <img src="{!! asset($message->image) !!}" height="200px" width="200px" class="thumbnail" /> <br />
                                                                                                    @endif
                                                                                                    @if($message->message)
                                                                                                        {!! $message->message !!}
                                                                                                    @endif
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
                                                                                                <div class="chat-message bg-msg">
                                                                                                    @if($message->image)
                                                                                                        <img src="{!! asset($message->image) !!}" height="200px" width="200px" class="thumbnail" /> <br />
                                                                                                    @endif
                                                                                                    @if($message->message)
                                                                                                        @if($message->deleted_by != null)
                                                                                                            <i>You deleted a message</i>
                                                                                                        @else
                                                                                                            {!! $message->message !!}
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </div>
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
                                                                            <button class="b-e-0">
                                                                                <input type="file" name="image_upload" id="image_upload_{{ $friendMessages[0]->friend_id }}" style="display: none;" accept="image/*" onchange="previewImage({{ $friendMessages[0]->friend_id }});">
                                                                                <svg height="25px" width="25px" onclick="document.getElementById('image_upload_{{ $friendMessages[0]->friend_id }}').click();" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#3d3975" d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"></path></svg>
                                                                            </button>
                                                                            <div class="msg-chat p-r">
                                                                                <div id="image_preview_{{ $friendMessages[0]->friend_id }}" style="display:none; width: 100px; height: 100px; margin-top:10px;"></div>
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
                    @if(isset($contacts))
                        @foreach($contacts as $contact)
                            <div class="msg-body @if($messages->isEmpty()) {!! $loop->first ? 'active' : '' !!} @endif" id="chat-{!! $contact->id !!}">
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
                                                                                            @if($contact->user_id != auth()->id())
                                                                                                <img src="{!! asset($contact->user->image) !!}">
                                                                                            @else
                                                                                                <img src="{!! asset($contact->sentBy->image) !!}">
                                                                                            @endif
                                                                                        </div>
                                                                                        <div style="flex: 1; margin-left:1rem;">
                                                                                            <h6 class="mb-0">
                                                                                                <div class="head-title-chat">
                                                                                                    @if($contact->user_id != auth()->id())
                                                                                                        {!! ($contact->user->first_name) !!} {!! ($contact->user->last_name) !!}
                                                                                                    @else
                                                                                                        {!! ($contact->sentBy->first_name) !!} {!! ($contact->sentBy->last_name) !!}
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
                                                            <div class="msg-sb-cont max" id="chat-content-scroll-{!! $contact->id !!}">
                                                                <div>
                                                                    <div class="p-r">
                                                                        <div class="text-center">
                                                                            <span class="message-time">Start Conservation by saying "Hi"</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="send-msg">
                                                                    <div class="p-r">
                                                                        <div class="d-flex">
                                                                            <button class="b-e-0">
                                                                                <input type="file" name="image_upload" id="image_upload_{{ $contact->id }}" style="display: none;" accept="image/*" onchange="previewImage({{ $contact->id }});" capture="camera">
                                                                                <svg height="25px" width="25px" onclick="document.getElementById('image_upload_{{ $contact->id }}').click();" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#3d3975" d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"></path></svg>
                                                                            </button>
                                                                            <div class="msg-chat p-r">
                                                                                <div id="image_preview_{{ $contact->id }}" style="display:none; width: 100px; height: 100px; margin-top:10px;"></div>
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
                    url: '{{ route("tenant.mark_messages_as_read") }}',
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
                var imageInput = document.getElementById('image_upload_' + $('.chat-contact.active').data('chat').split('-')[1]);
                var image = imageInput.files.length > 0 ? imageInput.files[0] : null;
                var message = messageBox.val();
                if (!message && !image) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please enter a message or select an image.'
                    });
                    return false; 
                }
                var formData = new FormData();
                formData.append('friend_id', $('.chat-contact.active').data('chat').split('-')[1]);
                formData.append('message', message);
                formData.append('_token', '{{ csrf_token() }}');
                if (image) {
                    formData.append('image', image);
                }

                $.ajax({
                    type: 'POST',
                    url: "{!! route('tenant.sendMessages') !!}",
                    data: formData,
                    contentType: false,
                    processData: false,
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
        $(document).on('click', '.back-chat', function() {
            var chatSidebar = document.querySelector('.msg-sidebar');
            chatSidebar.classList.toggle('show');
        });
        function previewImage(friendId) {
            var fileInput = document.getElementById('image_upload_' + friendId);
            
            var file = fileInput.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var imagePreviewDiv = document.getElementById('image_preview_' + friendId);
                imagePreviewDiv.style.backgroundImage = 'url(' + e.target.result + ')';
                imagePreviewDiv.style.backgroundSize = 'cover';
                imagePreviewDiv.style.backgroundPosition = 'center';
                imagePreviewDiv.style.display = 'block';
                const container = document.querySelector('.msg-sb-cont.max');
                if (container) {
                    let currentHeight = window.getComputedStyle(container).height;
                    currentHeight = parseInt(currentHeight, 10);
                    let newHeight = Math.max(currentHeight - 100, 0) + 'px';
                    container.style.height = newHeight;
                }
            };
            reader.readAsDataURL(file);
        }
        function adjustHeight() {
        const containers = document.querySelectorAll('.msg-sb-cont.max');

        containers.forEach(container => {
            let screenHeight = window.innerHeight;
            let screenWidth = window.innerWidth;
            if (screenHeight === 730) {
                if(screenWidth < 992)
                {
                    container.style.height = '55vh';
                }else{
                    container.style.height = '60vh';
                }
                
            } else {
                if (screenHeight < 500) {
                    container.style.height = '20vh';
                } else if (screenHeight < 550) {
                    container.style.height = '32vh';
                } else if (screenHeight < 600) {
                    container.style.height = '39vh';
                } else if (screenHeight < 650) {
                    container.style.height = '43vh';
                } else if (screenHeight < 700) {
                    container.style.height = '48vh';
                } else if (screenHeight < 800) {
                    container.style.height = '53vh';
                } else if (screenHeight < 900) {
                    container.style.height = '60vh';
                } else if (screenHeight < 1000) {
                    container.style.height = '63vh';
                } else if (screenHeight < 1200) {
                    container.style.height = '65vh';
                } else if (screenHeight < 1300) {
                    container.style.height = '70vh';
                } else {
                    container.style.height = '76vh';
                }
            }
        });        
    }

    window.addEventListener('resize', adjustHeight);
    adjustHeight();

    $(document).ready(function() {
        $('#searchContact').on('keyup', function() {
            var searchText = $(this).val().toLowerCase();
            $('.chat-contact').each(function() {
                var nameText = $(this).find('h6.mb-0').text().toLowerCase();
                if (nameText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.thumbnail').forEach(image => {
            image.addEventListener('click', function () {
                const overlay = document.createElement('div');
                overlay.className = 'image-overlay';

                const img = document.createElement('img');
                img.src = this.src; 
                img.className = 'full-size-image';

                const closeBtn = document.createElement('div');
                closeBtn.textContent = '✖';
                closeBtn.className = 'close-btn-x';

                overlay.appendChild(img);
                overlay.appendChild(closeBtn);
                document.body.appendChild(overlay);

                overlay.style.display = 'flex';

                closeBtn.addEventListener('click', () => {
                    document.body.removeChild(overlay); 
                });
            });
        });
    });

    </script>




</x-users.main.app-layout>