<x-users.main.app-layout>
    <x-slot name="head">
        - Maintenance Request
    </x-slot>
    <x-tenants.navbar />
    
     <!-- Start Banners -->
     <div class="is-tenant-banners">
        <div class="is-header-all-container">
            <div class="pt-20p hide">
                <ul class="banner-header-links">
                    <li class="banner-header-name">
                        <a href="index.html" class="banner-link-for-header">Home</a>
                    </li>
                    <li class="banner-header-name">
                        /<span class="banner-link-for-header for-normal">Maintainance Request</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="is-header-all-wrappers">
            <div class="is-header-all-wrappers">
                <div>
                    <h2 class="header-f0r-mobile text-center">Maintainance Request</h2>
                    <div class="is-header-all-wrappers padding">
                        <div class="is-header-all-container padding">
                            <header class="header-u-flex">
                                <div class="header-left-side-wrap">
                                    <div class="header-left-title">Maintainance Request</div>
                                    <p>0 Total</p>
                                </div>
                                <div class="header-right-side-wrap">
                                    <a href="newrequest.html" class="is-button-for-edit-profile add-icons">
                                        Add request 
                                    </a>
                                </div>
                            </header>
                            <div class="status-maintainance">
                                <div class="status-maintainance-container">
                                    <div class="status-filter-search for-mobile">
                                        <input type="text" autocomplete="off" placeholder="Search here..." class="filter-search-input">
                                    </div>
                                    <div class="status-filter">
                                        <div class="status-filter-search for-desktop">
                                            <input type="text" autocomplete="off" placeholder="Search here..." class="filter-search-input">
                                        </div>
                                        <div class="status-filter-wrappers p-r">
                                            <div class="status-filter-container-list" id="statusFullWrapper">
                                                <button type="button" class="button-close-for-filter"></button>
                                                <div class="filter-inside-text" id="insideTheBox">
                                                    <span class="mr-5p">Status</span>
                                                    <!-- <span class="status-filters fw-600">In Progress</span> -->
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="15" width="28" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                            </div>
                                            <div class="status-other-option-container" id="statusFullOption">
                                                <div class="status-other-option-wrapper">
                                                    <div class="popup-header">
                                                        <h3 class="popup-header-text">Status</h3>
                                                    </div>
                                                    <div class="pb-10p">
                                                        <div class="popup-content">
                                                            <div>
                                                                <select class="multi-scroll" placeholder="Status" id="multiScrollSelect">
                                                                    <option value="New">New</option>
                                                                    <option value="In Progress">In Progress</option>
                                                                    <option value="Cancelled">Cancelled</option>
                                                                    <option value="Completed">Completed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="popup-footer">
                                                        <button class="is-button-for-edit-profile btn-Primary" id="statusApply">Apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="status-filter-wrappers status-links status-tick" id="successStatusChange" style="display: none;"> Save filters </div><!-- This show on successfully Applied -->
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="maintainance-request-grid">
                                <div class="maintainance-grid-column">
                                    <div role="list">
                                        <div role="listitem">
                                            <div class="maintainance-card card-horizontal">
                                                <div class="card-extra-content">
                                                    <div class="extra-card-id">#1234</div>
                                                </div>
                                                <div class="card-title card-title-box">
                                                    <div class="maintenance-list-item-title">
                                                        Electrical / Communication / Internet / Not working 
                                                    </div>
                                                </div>
                                                <div class="card-left-part">
                                                    <div class="card-status-checked card-cancelled">Cancelled</div>
                                                </div>
                                                <div class="card-avatar-icons">
                                                    <div>
                                                        <div class="avatar-profile-imgs">
                                                            <div class="avatar-info-profile">
                                                                <div href="#" class="avatar-info-profile-imgs">
                                                                    <div class="profile-avatar-img">
                                                                        <div class="profile-avatar-img-wrapper">
                                                                            <div class="profile-avatar-image profile-avatar-no-img">T</div>
                                                                            <!-- <img src="../Images/Original/Banner-2.png" class="profile-avatar-image" alt=""> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-address-description">
                                                    <div id="cardAddressDescription">
                                                        <div class="maintenance-list-item-title">ZX Ranch Rd</div>
                                                    </div>
                                                </div>
                                                <div class="card-maintainance-hurry">
                                                    <div class="card-maint">
                                                        Normal
                                                    </div>
                                                </div>
                                                <div class="card-view-btn">
                                                    <a href="viewrequest.html" class="status-links view-btn">View</a>
                                                </div>
                                                <div class="card-right-grid">
                                                    <div class="d-flex p-r">
                                                        <div class="d-print-icon"></div>
                                                        <div>
                                                            <div id="moreIcons">
                                                                <button type="button" role="button" class="btn-more-option">
                                                                    <div class="btn-icons-more"></div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="more-info-for-maintainance">
                                                            <div class="p-10p">
                                                                <div class="btn-container-opt below">
                                                                    <a href="../Errors/404Error.html" class="upper-btn">Print</a>
                                                                </div>
                                                                <div class="btn-container-opt">
                                                                    <a href="../Errors/404Error.html" class="lower-btn">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="listitem">
                                            <div class="maintainance-card card-horizontal">
                                                <div class="card-extra-content">
                                                    <div class="extra-card-id">#1234</div>
                                                </div>
                                                <div class="card-title card-title-box">
                                                    <div class="maintenance-list-item-title">
                                                        Electrical / Communication / Internet / Not working 
                                                    </div>
                                                </div>
                                                <div class="card-left-part">
                                                    <div class="card-status-checked card-in-progress">In Progress</div>
                                                </div>
                                                <div class="card-avatar-icons">
                                                    <div>
                                                        <div class="avatar-profile-imgs">
                                                            <div class="avatar-info-profile">
                                                                <div href="#" class="avatar-info-profile-imgs">
                                                                    <div class="profile-avatar-img">
                                                                        <div class="profile-avatar-img-wrapper">
                                                                            <div class="profile-avatar-image profile-avatar-no-img">T</div>
                                                                            <!-- <img src="../Images/Original/Banner-2.png" class="profile-avatar-image" alt=""> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-address-description">
                                                    <div id="cardAddressDescription">
                                                        <div class="maintenance-list-item-title">ZX Ranch Rd</div>
                                                    </div>
                                                </div>
                                                <div class="card-maintainance-hurry">
                                                    <div class="card-maint">
                                                        Normal
                                                    </div>
                                                </div>
                                                <div class="card-view-btn">
                                                    <a href="../Errors/404Error.html" class="status-links view-btn">View</a>
                                                </div>
                                                <div class="card-right-grid">
                                                    <div class="d-flex p-r">
                                                        <div class="d-print-icon"></div>
                                                        <div>
                                                            <div id="moreIcons">
                                                                <button type="button" role="button" class="btn-more-option">
                                                                    <div class="btn-icons-more"></div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="more-info-for-maintainance">
                                                            <div class="p-10p">
                                                                <div class="btn-container-opt below">
                                                                    <a href="../Errors/404Error.html" class="upper-btn">Print</a>
                                                                </div>
                                                                <div class="btn-container-opt">
                                                                    <a href="../Errors/404Error.html" class="lower-btn">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="listitem">
                                            <div class="maintainance-card card-horizontal">
                                                <div class="card-extra-content">
                                                    <div class="extra-card-id">#1234</div>
                                                </div>
                                                <div class="card-title card-title-box">
                                                    <div class="maintenance-list-item-title">
                                                        Electrical / Communication / Internet / Not working 
                                                    </div>
                                                </div>
                                                <div class="card-left-part">
                                                    <div class="card-status-checked card-resolved">Resolved</div>
                                                </div>
                                                <div class="card-avatar-icons">
                                                    <div>
                                                        <div class="avatar-profile-imgs">
                                                            <div class="avatar-info-profile">
                                                                <div href="#" class="avatar-info-profile-imgs">
                                                                    <div class="profile-avatar-img">
                                                                        <div class="profile-avatar-img-wrapper">
                                                                            <div class="profile-avatar-image profile-avatar-no-img">T</div>
                                                                            <!-- <img src="../Images/Original/Banner-2.png" class="profile-avatar-image" alt=""> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-address-description">
                                                    <div id="cardAddressDescription">
                                                        <div class="maintenance-list-item-title">ZX Ranch Rd</div>
                                                    </div>
                                                </div>
                                                <div class="card-maintainance-hurry">
                                                    <div class="card-maint">
                                                        Urgent
                                                    </div>
                                                </div>
                                                <div class="card-view-btn">
                                                    <a href="../Errors/404Error.html" class="status-links view-btn">View</a>
                                                </div>
                                                <div class="card-right-grid">
                                                    <div class="d-flex p-r">
                                                        <div class="d-print-icon"></div>
                                                        <div>
                                                            <div id="moreIcons">
                                                                <button type="button" role="button" class="btn-more-option">
                                                                    <div class="btn-icons-more"></div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="more-info-for-maintainance">
                                                            <div class="p-10p">
                                                                <div class="btn-container-opt below">
                                                                    <a href="../Errors/404Error.html" class="upper-btn">Print</a>
                                                                </div>
                                                                <div class="btn-container-opt">
                                                                    <a href="../Errors/404Error.html" class="lower-btn">Delete</a>
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

                            <!-- WHen There is No Request -->
                            <div class="placeholder no-request">
                                <div class="placeholder-container">
                                    <div class="placeholder-grid opacity-low">
                                        <ul class="loading-req">
                                            <li class="placeholder-card">
                                                <span class="placeholder-bar-progress"></span>
                                            </li>
                                            <li class="placeholder-card">
                                                <span class="placeholder-bar-progress"></span>
                                            </li>
                                        </ul>
                                        <div class="placeholder-grid no-req">
                                            <svg height="35" width="35" class="mb-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" fill="#3d3975"/>
                                            </svg>
                                            <div class="placeholder-sub-header">
                                                No requests
                                            </div>
                                            <p class="paragraph text-center text-small-for-mobile"> You can submit a maintenance request if you have a connection with Landlord and shared lease. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of WHen There is No Request -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banners -->

    <x-tenants.footer />
</x-users.main.app-layout>
    