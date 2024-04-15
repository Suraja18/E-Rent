<x-users.main.app-layout>
    <x-slot name="head">
        - Message
    </x-slot>
    <x-users.navbar />

    <div class="card-dashboard chat-msg" style="overflow: hidden">
        <div class="p-r d-flex p-0">
            <div class="chat-sidebar">
                <div class="contacts-list p-r">
                    <div class="simple-wrapper">
                        <div class="simple-mask">
                            <div class="simple-mask edit">
                                <div class="simple-content-wrapper">
                                    <div class="simple-content p-0">
                                        <div class="simple-nav" role="list">
                                            <div class="chat-contact active" data-chat="chat-0">
                                                <div class="d-flex" style="padding: 1rem">
                                                    <div class="avatar-img status-online">
                                                        <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                                    </div>
                                                    <div class="nav-flex d-b p-r">
                                                        <div class="d-flex" style="justify-content: space-between">
                                                            <h6 class="mb-0">Antino Operas</h6>
                                                            <span class="message-time">Tue</span>
                                                        </div>
                                                        <div>
                                                            <div class="chat-contact-content">Sent a message</div>
                                                            <div class="chat-sent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-contact" data-chat="chat-1">
                                                <div class="d-flex" style="padding: 1rem">
                                                    <div class="avatar-img">
                                                        <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                                    </div>
                                                    <div class="nav-flex d-b p-r">
                                                        <div class="d-flex" style="justify-content: space-between">
                                                            <h6 class="mb-0">Antino Operas</h6>
                                                            <span class="message-time">Tue</span>
                                                        </div>
                                                        <div>
                                                            <div class="chat-contact-content">You: 🙂</div>
                                                            <div class="chat-sent">
                                                                <svg class="svg-inline-fa text-success" data-fa-transform="shrink-5 down-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.75em;"><g transform="translate(256 256)"><g transform="translate(0, 128)  scale(0.6875, 0.6875)  rotate(0 0 0)"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" transform="translate(-256 -256)"></path></g></g></svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-contact" data-chat="chat-2">
                                                <div class="d-flex" style="padding: 1rem">
                                                    <div class="avatar-img status-online">
                                                        <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                                    </div>
                                                    <div class="nav-flex d-b p-r">
                                                        <div class="d-flex" style="justify-content: space-between">
                                                            <h6 class="mb-0">Antino Operas</h6>
                                                            <span class="message-time">Tue</span>
                                                        </div>
                                                        <div>
                                                            <div class="chat-contact-content">Sent a message</div>
                                                            <div class="chat-sent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-contact" data-chat="chat-3">
                                                <div class="d-flex" style="padding: 1rem">
                                                    <div class="avatar-img status-online">
                                                        <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                                    </div>
                                                    <div class="nav-flex d-b p-r">
                                                        <div class="d-flex" style="justify-content: space-between">
                                                            <h6 class="mb-0">Antino Operas</h6>
                                                            <span class="message-time">Tue</span>
                                                        </div>
                                                        <div>
                                                            <div class="chat-contact-content">You: Hi</div>
                                                            <div class="chat-sent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-contact" data-chat="chat-4">
                                                <div class="d-flex" style="padding: 1rem">
                                                    <div class="avatar-img status-online">
                                                        <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                                    </div>
                                                    <div class="nav-flex d-b p-r">
                                                        <div class="d-flex" style="justify-content: space-between">
                                                            <h6 class="mb-0">Antino Operas</h6>
                                                            <span class="message-time">Tue</span>
                                                        </div>
                                                        <div>
                                                            <div class="chat-contact-content">Sent a message</div>
                                                            <div class="chat-sent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                <div class="tab-pane card-chat-pane active" id="chat-0">
                    <div class="chat-content-header">
                        <div class="row sidebar-content-wrapper align-center">
                            <div class="chat-headers">
                                <a href="#" class="back-chat">
                                    <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
                                </a>
                                <div>
                                    <h5 class="mb-0">Antony Hopkins</h5>
                                    <div class="message-time" style="margin-top:4px">Active On Chat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-content-body">
                        <div class="chat-content-scroll">
                            <div class="chat-up">
                                <div class="avatar-img status-online" style="height:3.5rem; width:3.5rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:1rem;">
                                    <h6 class="mb-0">
                                        <a href="#" class="head-title-chat">Antony Hopkins</a>
                                    </h6>
                                    <p class="mb-0" style="margin-top: 0;">You friends with Antony Hopkins. Say hi to start the conversation</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="message-time">May 5, 2019, 11:54 am</span>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="message-time">May 6, 2019, 11:54 am</span>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-1">
                    <div class="chat-content-header">
                        <div class="row sidebar-content-wrapper align-center">
                            <div class="chat-headers">
                                <div>
                                    <h5 class="mb-0">Antony Hopkins</h5>
                                    <div class="message-time" style="margin-top:4px">Active On Chat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-content-body">
                        <div class="chat-content-scroll">
                            <div class="chat-up">
                                <div class="avatar-img status-online" style="height:3.5rem; width:3.5rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:1rem;">
                                    <h6 class="mb-0">
                                        <a href="#" class="head-title-chat">Antony Hopkins</a>
                                    </h6>
                                    <p class="mb-0" style="margin-top: 0;">You friends with Antony Hopkins. Say hi to start the conversation</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="message-time">May 5, 2019, 11:54 am</span>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                What ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="message-time">May 6, 2019, 11:54 am</span>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-2">
                    <div class="chat-content-header">
                        <div class="row sidebar-content-wrapper align-center">
                            <div class="chat-headers">
                                <div>
                                    <h5 class="mb-0">Antony</h5>
                                    <div class="message-time" style="margin-top:4px">Active On Chat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-content-body">
                        <div class="chat-content-scroll">
                            <div class="chat-up">
                                <div class="avatar-img status-online" style="height:3.5rem; width:3.5rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:1rem;">
                                    <h6 class="mb-0">
                                        <a href="#" class="head-title-chat">Antony Hopkins</a>
                                    </h6>
                                    <p class="mb-0" style="margin-top: 0;">You friends with Antony Hopkins. Say hi to start the conversation</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="message-time">May 5, 2019, 11:54 am</span>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="avatar-img status" style="height:2rem; width:2rem;">
                                    <img src="{!! asset('Images/Variable/Person/1.jpg') !!}" alt="">
                                </div>
                                <div style="flex: 1; margin-left:.75rem;">
                                    <div class="hover-effect">
                                        <div class="p-r d-flex ">
                                            <div class="chat-message bg-msg">
                                                Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time"><span>11:54 am</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="padding: 1rem;">
                                <div class="d-flex" style="flex: 1; justify-content: flex-end ;">
                                    <div class="hover-effect" style="width:100%">
                                        <div class="p-r d-flex align-center" style="flex-flow: row-reverse;">
                                            <div class="chat-message bg-msg-online">
                                                What are you doing ?
                                            </div>
                                            <ul class="hover-action icons-on-hover">
                                                <li class="list-inline-item">
                                                    <a href="#" class="icon-color">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="icon-color" href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <svg class="svg-inline-fa" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="message-time d-flex" style="flex-flow: row-reverse;">
                                            <svg class="svg-inline-fa text-success svg-tick" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                                            <span>11:54 am</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <form class="chat-editor-area" action="">
                    <input type="text" name="" id="" class="write-message" placeholder = "Write a message..." />
                    <button class="btn-send">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // JavaScript/jQuery
        $(document).ready(function() {
            $('.chat-contact').click(function() {
                $('.chat-contact').removeClass('active');
                $(this).addClass('active');
                var chatId = $(this).data('chat');
                $('.chat-content-tab .tab-pane').removeClass('active');
                $('#' + chatId).addClass('active');
            });
        });
        // JavaScript/jQuery

    </script>

</x-users.main.app-layout>