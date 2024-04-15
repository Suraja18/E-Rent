<div class="is-header-all-wrappers">
    <div class="is-header-all-wrappers">
        <div>
            {{-- Start Here Edit Profile --}}
            <div class="flex-cl-1">
                <div class="flex-cl-1 account-sett">
                    <header class="profile-setting-header d-flex" style="justify-content: space-between">
                        <h2 class="profile-panel-title">Edit Profile</h2>
                        <a href="{!! $routeFRD !!}" class="is-button-for-edit-profile">View All Friends</a>
                    </header>
                    <div class="flex-cl-1" style="padding:20px">
                        <div>
                            <form class="profile-grids" method="POST" action="{!! $route !!}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="profile-grids-header">
                                    <h4 class="settings-profiles-head">Profile details</h4>
                                    <p class="profile-p"> Your profile is visible to your connected users. </p>
                                </div>
                                <div class="profile-grids-body">
                                    <div class="row">
                                        <div class="row-halfs mb-15">
                                            <h6 class="mb-1">First Name</h6>
                                            <input type="text" name="first_name" class="form-control table-datas" @if(isset($first_name)) value="{!! $first_name !!}" @endif placeholder="Enter First Name" required />
                                            @error('first_name')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="row-halfs mb-15">
                                            <h6 class="mb-1">Last Name</h6>
                                            <input type="text" name="last_name" class="form-control table-datas" @if(isset($last_name)) value="{!! $last_name !!}" @endif placeholder="Enter Last Name" required />
                                            @error('last_name')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-15">
                                            <h6 class="mb-1">Phone Number</h6>
                                            <input type="text" name="phone_number" class="form-control table-datas" @if(isset($phone_number)) value="{!! $phone_number !!}" @endif placeholder="Enter Phone Number" required />
                                            @error('phone_number')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="row-halfs mb-15">
                                            <h6 class="mb-1">Address</h6>
                                            <input type="text" name="address" class="form-control table-datas" @if(isset($address)) value="{!! $address !!}" @endif placeholder="Enter Address" required />
                                            @error('address')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="row-halfs mb-15">
                                            <h6 class="mb-1">Gender</h6>
                                            <select class="form-control table-datas"  name="gender" required>
                                                @if(isset($gender)) <option value="{!! $gender !!}">{!! $gender !!}</option> @endif
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-15">
                                            <button type="submit" class="is-button-for-edit-profile" disabled >
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-grids-avatar">
                                    @if(!isset($image)) 
                                        <div class="profile-avatar-img-container profile-upload">
                                            <div class="avatar-images-contain">@if(isset($first_name)){!! substr($first_name, 0, 1) !!} @endif</div>
                                        </div>
                                    @endif
                                    @if(isset($image)) <img src="{!! asset($image) !!}" alt="@if(isset($first_name)){!! $first_name !!} @endif" class="profile-avatar-img-container profile-image"> @endif
                                    <div class="p-r">
                                        <div>
                                            <input type="file" name="image" class="table-btns for-delete-prof" id="UPLOAD-IMAGE" />
                                            @error('image')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="margin-panel-hr" />
                        <div>
                            <div class="row">
                                <div class="mb-15">
                                    <div class="d-flex" style="justify-content: space-between">
                                        <h6 class="mb-1">Email</h6>
                                        <a href="#" target="_blank" class="status-links clr-green">Change</a>
                                    </div>
                                    <p class="profile-p">Your email is <b>@if(isset($email)) {!! $email !!} @endif</b></p>
                                </div>
                            </div>
                        </div>
                        <hr class="margin-panel-hr" />
                        <div>
                            <div class="row">
                                <div class="mb-15">
                                    <div class="d-flex" style="justify-content: space-between">
                                        <h6 class="mb-1">Password</h6>
                                        <a href="#" target="_blank" class="status-links clr-green">Change</a>
                                    </div>
                                    <p class="profile-p">You haven’t changed the password yet.</p>
                                </div>
                            </div>
                        </div>
                        <hr class="margin-panel-hr" />
                        <div>
                            <div class="profile-grids-header">
                                <h4 class="settings-profiles-head">Delete Account</h4>
                                <p class="profile-p"> Please note that all of the information will be permanently deleted. </p class="profile-p">
                            </div>
                            <input type="submit" value="Delete account" class="table-btns danger for-delete-prof" />
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Here Edit Profile --}}
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.profile-grids-body .form-control').on('input', function() {
            $('.is-button-for-edit-profile').prop('disabled', false);
        });
        $('input[type="file"]').on('change', function() {
            $('.is-button-for-edit-profile').prop('disabled', false);
        });
    });
</script>