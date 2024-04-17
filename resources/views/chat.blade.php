<x-users.main.app-layout>
    <x-slot name="head">
        - About Us
    </x-slot>
    <x-users.navbar />

    <div class="invoice-container plr-4">
        <div class="is-header-all-wrappers">
            <div class="is-header-all-wrappers">
                <div>
                    <div class="flex-cl-1">
                        <div class="flex-cl-1 account-sett" style=" width: 100%;">
                            <div class="flex-cl-1" style="padding:20px">
                                <div>
                                    <div class="pr-container">
                                        <div class="pr-wrapper">
                                            <div>
                                                <div class="pr-div">
                                                    <div class="pr-profile">
                                                        <div class="pr-profile-container">
                                                            <img height="168" width="168" src="{!! asset('Images/Variable/Building/3c140f76-09f2-4520-b94b-910dbdf80bc9-1712124556.png') !!}" class="pr-profile-container" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="pr-info">
                                                        <div class="pr-info-container">
                                                            <div class="pr-info-container body">
                                                                <div style="margin: .5rem 0">
                                                                    <span class="pr-header">
                                                                        <h1>Suraj Adhikari</h1>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="pr-info-container body">
                                                                <span class="pr-friends">
                                                                    <h1 class="pr-friends">5 friends</h1>
                                                                </span>
                                                            </div>
                                                            <div class="pr-info-container body">
                                                                <div style="margin: .5rem 0">
                                                                    <span class="pr-header">
                                                                        <h3>Tenants</h3>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pr-buttons d-flex">
                                                            <div class="pr-button-container">
                                                                <a href="#" class="pr-button-wrapper">
                                                                    <div class="pr-button-bg">
                                                                         <div class="pr-button-flex">
                                                                            <div class="pr-button-icon">
                                                                                <img class="plus-image" src="{!! asset('Images/Original/plusimage.png') !!}" height="16" width="16">
                                                                            </div>
                                                                            <div class="pr-button-icon">
                                                                                <span class="icon-text">Add Friends</span>
                                                                            </div>
                                                                         </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="pr-button-container">
                                                                <a href="#" class="pr-button-wrapper">
                                                                    <div class="pr-button-bg active">
                                                                         <div class="pr-button-flex">
                                                                            <div class="pr-button-icon">
                                                                                <img class="plus-image" src="{!! asset('Images/Original/friendsuccess.png') !!}" height="16" width="16">
                                                                            </div>
                                                                            <div class="pr-button-icon">
                                                                                <span class="icon-text">Friends</span>
                                                                            </div>
                                                                         </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="pr-button-container">
                                                                <a href="#" class="pr-button-wrapper">
                                                                    <div class="pr-button-bg active">
                                                                         <div class="pr-button-flex">
                                                                            <div class="pr-button-icon">
                                                                                <img class="plus-image" src="{!! asset('Images/Original/tick-image.png') !!}" height="16" width="16">
                                                                            </div>
                                                                            <div class="pr-button-icon">
                                                                                <span class="icon-text">Friend Request Sent</span>
                                                                            </div>
                                                                         </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="pr-button-container">
                                                                <a class="pr-button-wrapper" id="svgButton">
                                                                    <div class="pr-button-bg bor">
                                                                         <div class="pr-button-flex p-r">
                                                                            <div class="pr-button-icon">
                                                                                <svg viewBox="0 0 24 24" width="16" height="16" fill="#3d3975"><circle cx="12" cy="12" r="2.5"></circle><circle cx="19.5" cy="12" r="2.5"></circle><circle cx="4.5" cy="12" r="2.5"></circle></svg>
                                                                            </div>
                                                                            <div class="pr-unfriend-container" id="PRUnfriend">
                                                                                    <button type="button" class="pr-button-bg pr-button-flex">
                                                                                        <div class="pr-button-icon">
                                                                                            <img class="plus-image" src="{!! asset('Images/Original/unfriend-image.png') !!}" height="16" width="16">
                                                                                        </div>
                                                                                        <div class="pr-button-icon">
                                                                                            <span class="icon-text">Unfriend</span>
                                                                                        </div>
                                                                                    </button>
                                                                             </div> 
                                                                         </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="pr-wrapper-body">
                                                <div class="d-flex p-r" style="flex-direction: column">
                                                    <div class="pr-wrapper-container">
                                                        <h2>Bio</h2>
                                                    </div>
                                                    <div class="d-576" style="margin-bottom: 8px;">
                                                        <h4 style="min-width: 150px">Phone Number: </h4>
                                                        <span class="pr-content">9867808207</span>
                                                    </div>
                                                    <div class="d-576" style="margin-bottom: 8px;">
                                                        <h4 style="min-width: 150px">Email: </h4>
                                                        <span class="pr-content">abc@gmail.com</span>
                                                    </div>
                                                    <div class="d-576" style="margin-bottom: 8px;">
                                                        <h4 style="min-width: 150px">Address: </h4>
                                                        <span class="pr-content">Pokhara-32</span>
                                                    </div>
                                                    <div class="d-576" style="margin-bottom: 8px;">
                                                        <h4 style="min-width: 150px">Gender: </h4>
                                                        <span class="pr-content">Male</span>
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
    </div>
    <script>
        document.getElementById('svgButton').addEventListener('click', function() {
            var PRUnfriend = document.getElementById('PRUnfriend');
            PRUnfriend.classList.toggle('active');
        });
    </script>

    <x-users.footer />


</x-users.main.app-layout>