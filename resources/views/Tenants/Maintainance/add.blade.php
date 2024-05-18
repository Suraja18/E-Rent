<x-users.main.app-layout>
    <x-slot name="head">
        - Add Maintenance
    </x-slot>
    <x-tenants.navbar />

    <!-- Start Banners -->
    <div class="is-tenant-banners">
        <div class="is-header-all-wrappers">
            <div class="is-header-all-wrappers">
                <div>
                    <h2 class="header-f0r-mobile text-center">Maintainance Request</h2>
                    <div class="is-header-all-wrappers padding">
                        <div class="is-header-all-container padding">
                            <header class="header-u-flex">
                                <div class="header-left-side-wrap">
                                    <div class="header-left-title">Maintainance Request</div>
                                </div>
                            </header>
                            <div class="request-back">
                                <div class="request-btn-back">
                                    <a href="{!! route('tenant.maintenanceRequest') !!}" class="reuqest-btn-back-icons">back</a>
                                </div>
                            </div>
                        </div>
                        <div class="is-tenant-banners p-r">
                            <div class="is-header-all-wrappers">
                                <div id="scopePage">
                                    <div class="is-header-all-wrappers">
                                        <div class="request-maintain-container">
                                            <div class="is-header-all-container">
                                                <form class="all-wrapper-maintainance-req" method="POST" enctype="multipart/form-data" action="{!! route('tenant.maintenance.store') !!}">
                                                    @csrf
                                                    <div class="wizard-contents" role="list">
                                                        
                                                        <x-common.maintenance-is-first />
                                                        <x-common.maintenance-is-second />
                                                        <x-common.maintenance-is-third />

                                                        <div class="wizard-steps is-image" role="listitem" id="wizardStepImage">
                                                            <div class="sub-form-is-image">
                                                                <div class="wizard-titles">
                                                                    <div class="text-center">
                                                                        <h2 class="form-wizard-title text-center">Take a picture of the issue</h2>
                                                                        <p class="form-wizard-description text-center">Add details of the problem to visualise the issue.</p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="wizard-rows">
                                                                        <div class="wizard-rows-card sub-card p-r">
                                                                            <div class="for-mobile-m">
                                                                                <div class="p-r">
                                                                                    <div class="file-uploads">
                                                                                        <div class="image-file-upload">
                                                                                            <input type="file" name="MaintainanceRequestImage" id="MaintainanceRequestImage" class="file-upload" accept="image/*">
                                                                                            <label for="MaintainanceRequestImage" class="main-image-req">
                                                                                                <img src="{!! asset('Images/Original/Request/PlusCircle.svg') !!}" alt="Plus" class="image-upload-file">
                                                                                                <h3 class="upload-file-title">Attachments</h3>
                                                                                                <small class="upload-file-desc"> Add photo or upload a file </small>
                                                                                                <span class="btn-link-upload-img">Upload</span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wizard-rows-card sub-card p-r">
                                                                            <div class="for-mobile-m">
                                                                                <div class="p-r">
                                                                                    <div class="file-uploads">
                                                                                        <div class="image-file-upload">
                                                                                            <input type="file" name="MaintainanceRequestVideo" id="MaintainanceRequestVideo" class="file-upload" accept="video/*">
                                                                                            <label for="MaintainanceRequestVideo" class="main-image-req">
                                                                                                <img src="{!! asset('Images/Original/Request/VideoIcon.svg') !!}" alt="Plus" class="image-upload-file">
                                                                                                <h3 class="upload-file-title">Videos</h3>
                                                                                                <small class="upload-file-desc"> Take 15 sec. video of the problem </small>
                                                                                                <span class="btn-link-upload-img">Upload</span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('MaintainanceRequestImage')
                                                                    <p class="error-message">{{ $message }}</p>
                                                                @enderror
                                                                @error('MaintainanceRequestVideo')
                                                                    <p class="error-message">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="wizard-next-btn">
                                                                <button type="button" class="nextBtnForReq btn-Primary" id="nextBtnForReq">Next</button>
                                                            </div>
                                                        </div>
                                                        <div class="wizard-steps is-describe-issue" role="listitem" id="wizardStepDescription">
                                                            <div class="sub-form-is-image">
                                                                <div class="wizard-titles">
                                                                    <div class="text-center">
                                                                        <h2 class="form-wizard-title text-center">Describe the issue</h2>
                                                                        <p class="form-wizard-description text-center">Provide the issue details</p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="upper-input-container p-r input-upper-wrapper">
                                                                        <div class="input-upper-wrappers">
                                                                            <span class="input-small-head">Building</span>
                                                                            <span class="input-small-wrap">
                                                                                <select name="rented_id" class="input-prb-form" required>
                                                                                    <option value="">Select Property...</option>
                                                                                    @foreach ($properties as $property)
                                                                                        <option value="{!! $property->id !!}">
                                                                                            {!! $property->rentProperty->building->name !!}
                                                                                            @if(isset($property->rentProperty->rent_name))
                                                                                                {!! "/ " . $property->rentProperty->rent_name !!}
                                                                                            @endif
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </span>
                                                                            @error('rented_id')
                                                                                <p class="error-message">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="upper-input-container p-r input-upper-wrapper">
                                                                        <div class="input-upper-wrappers">
                                                                            <span class="input-small-head">Title</span>
                                                                            <span class="input-small-wrap">
                                                                                <input type="text" maxlength="150" name="title" required="required" placeholder="problem" class="input-prb-form">
                                                                            </span>
                                                                            @error('title')
                                                                                <p class="error-message">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="upper-input-container p-r input-upper-wrapper">
                                                                        <div class="input-upper-wrappers">
                                                                            <span class="input-small-head">Description</span>
                                                                            <span class="input-small-wrap">
                                                                                <textarea required="required" name="description" cols="30" rows="10" class="input-prb-form description"></textarea>
                                                                            </span>
                                                                            @error('description')
                                                                                <p class="error-message">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                            <div class="wizard-next-btn">
                                                                <button type="button" class="nextBtnForReq btn-Primary" id="continueBtnForReq">Continue</button>
                                                            </div>
                                                        </div>
                                                        <div class="wizard-steps is-address" role="listitem" id="wizardStepAddress">
                                                            <div>
                                                                <div class="wizard-titles">
                                                                    <div class="text-center">
                                                                        <h2 class="form-wizard-title text-center">Request Availability</h2>
                                                                        <p class="form-wizard-description text-center">Provide the maintenance availability details</p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="upper-input-container p-r input-upper-wrapper">
                                                                        <div class="input-upper-wrappers">
                                                                            <span class="input-small-head">Initiated Date</span>
                                                                            <span class="input-small-wrap">
                                                                                <input type="date" maxlength="150" name="date" required="required" placeholder="Date" class="input-prb-form">
                                                                            </span>
                                                                            @error('date')
                                                                                <p class="error-message">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="upper-input-container p-r input-upper-wrapper">
                                                                        <div class="input-upper-wrappers">
                                                                            <span class="input-small-head">Availability Time 1 </span>
                                                                            <span class="input-small-wrap">
                                                                                <input type="time" maxlength="150" name="time1" required="required" placeholder="time" class="input-prb-form">
                                                                            </span>
                                                                            @error('time1')
                                                                                <p class="error-message">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>   
                                                                    <div class="upper-input-container p-r input-upper-wrapper">
                                                                        <div class="input-upper-wrappers">
                                                                            <span class="input-small-head">Availability Time 2 </span>
                                                                            <span class="input-small-wrap">
                                                                                <input type="time" maxlength="150" name="time2" placeholder="time" class="input-prb-form">
                                                                            </span>
                                                                            @error('time2')
                                                                                <p class="error-message">{{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>      
                                                                </div>
                                                                <div class="wizard-next-btn">
                                                                    <button type="button" class="nextBtnForReq btn-Primary" id="nextBtnForLocation" >Next</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="wizard-steps is-last" role="listitem" id="wizardStepPiority">
                                                            <div>
                                                                <div class="wizard-titles">
                                                                    <div class="text-center">
                                                                        <h2 class="form-wizard-title text-center">Request priority</h2>
                                                                        <p class="form-wizard-description text-center">How urgent the issue is?.</p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="wizard-rows">
                                                                        <div class="col-24 last-piority">
                                                                            <div class="listitems-piority" role="listitem">
                                                                                <div class="wizard-radio">
                                                                                    <input type="radio" name="piority" id="piority1" class="empty-radio" value="Low">
                                                                                    <label for="piority1">
                                                                                        <div class="wizard-radio-icons"></div>
                                                                                        <h3 class="wizard-radio-title">Low</h3>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="listitems-piority" role="listitem">
                                                                                <div class="wizard-radio">
                                                                                    <input type="radio" name="piority" id="piority2" class="empty-radio" value="Normal">
                                                                                    <label for="piority2">
                                                                                        <div class="wizard-radio-icons"></div>
                                                                                        <h3 class="wizard-radio-title">Normal</h3>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="listitems-piority" role="listitem">
                                                                                <div class="wizard-radio">
                                                                                    <input type="radio" name="piority" id="piority3" class="empty-radio" value="High">
                                                                                    <label for="piority3">
                                                                                        <div class="wizard-radio-icons"></div>
                                                                                        <h3 class="wizard-radio-title">High</h3>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="listitems-piority" role="listitem">
                                                                                <div class="wizard-radio">
                                                                                    <input type="radio" name="piority" id="piority4" class="empty-radio" value="Critical">
                                                                                    <label for="piority4">
                                                                                        <div class="wizard-radio-icons"></div>
                                                                                        <h3 class="wizard-radio-title">Critical</h3>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @error('piority')
                                                                            <p class="error-message">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="wizard-next-btn">
                                                                <button type="submit" class="nextBtnForReq btn-Primary" id="nextBtnForCreateReq">Create request</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
    <!-- End Banners -->

    <x-tenants.footer />

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const radioButtons = document.querySelectorAll('input[type="radio"][name="115"], input[type="radio"][name="116"], input[type="radio"][name="117"]');
        const titleInput = document.querySelector('input[placeholder="problem"]');
        function getRadioButtonLabel(radioButton) {
            return radioButton.parentNode.querySelector('.wizard-radio-title').innerText;
        }
        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                let labels = [];
                radioButtons.forEach(function(radio) {
                    if (radio.checked) {
                        labels.push(getRadioButtonLabel(radio));
                    }
                });
                titleInput.value = labels.join(' / ');
                titleInput.readOnly = true;
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const imageInput = document.getElementById('MaintainanceRequestImage');
        const label = document.querySelector('.main-image-req');
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    label.style.backgroundImage = `url('${e.target.result}')`;
                };
                reader.readAsDataURL(file);
                label.classList.add('active');
            }
        });
    });
</script>
    
</x-users.main.app-layout>