<div class="wizard-steps is-third" role="listitem">
    <div class="sub-form-category-list is-third is-appliancedishwasher">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Door",
                        "slug" => "categoryappliancedishwasherdoor", 
                    ],
                    [
                        "heading" => "Leaking",
                        "slug" => "categoryappliancedishwasherleaking", 
                    ],
                    [
                        "heading" => "Power",
                        "slug" => "categoryappliancedishwasherpower", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-applianceheatingcooling">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Filter",
                        "slug" => "categoryapplianceheatingcoolingfilter", 
                    ],
                    [
                        "heading" => "No Heat",
                        "slug" => "categoryapplianceheatingcoolingnoheat", 
                    ],
                    [
                        "heading" => "Not Cold",
                        "slug" => "categoryapplianceheatingcoolingnotcold", 
                    ],
                    [
                        "heading" => "Thermostat",
                        "slug" => "categoryapplianceheatingcoolingthermostat", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-appliancelaundryvendor">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Dryer",
                        "slug" => "categoryappliancelaundryvendordryer", 
                    ],
                    [
                        "heading" => "Vending Machine",
                        "slug" => "categoryappliancelaundryvendorvendingmachine", 
                    ],
                    [
                        "heading" => "Washing Machine",
                        "slug" => "categoryappliancelaundryvendorwashingmachine", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-applianceovenstove">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Door",
                        "slug" => "categoryapplianceovenstovedoor", 
                    ],
                    [
                        "heading" => "Handle",
                        "slug" => "categoryapplianceovenstovehandle", 
                    ],
                    [
                        "heading" => "Light",
                        "slug" => "categoryapplianceovenstovelight", 
                    ],
                    [
                        "heading" => "Oven",
                        "slug" => "categoryapplianceovenstoveoven", 
                    ],
                    [
                        "heading" => "Stove top",
                        "slug" => "categoryapplianceovenstovestovetop", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-appliancerefrigerator">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Freezer",
                        "slug" => "categoryappliancerefrigeratorfreezer", 
                    ],
                    [
                        "heading" => "Handle",
                        "slug" => "categoryappliancerefrigeratorhandle", 
                    ],
                    [
                        "heading" => "Light",
                        "slug" => "categoryappliancerefrigeratorlight", 
                    ],
                    [
                        "heading" => "Shelves",
                        "slug" => "categoryappliancerefrigeratorshelves", 
                    ],
                    [
                        "heading" => "Temperature",
                        "slug" => "categoryappliancerefrigeratortemperature", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-appliancewaterheater">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking",
                        "slug" => "categoryappliancewaterheaterleaking", 
                    ],
                    [
                        "heading" => "Not Working",
                        "slug" => "categoryappliancewaterheaternotworking", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-electricalceilingfan">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Smoke Detectors",
                        "slug" => "categoryelectricalceilingfansmokedetectors", 
                    ],
                    [
                        "heading" => "Not Working",
                        "slug" => "categoryelectricalceilingfannotworking", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-electricalcommunication">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Doorbell",
                        "slug" => "categoryelectricalcommunicationdoorbell", 
                    ],
                    [
                        "heading" => "Phone",
                        "slug" => "categoryelectricalcommunicationphone", 
                    ],
                    [
                        "heading" => "Cable",
                        "slug" => "categoryelectricalcommunicationcable", 
                    ],
                    [
                        "heading" => "Internet",
                        "slug" => "categoryelectricalcommunicationinternet", 
                    ],
                    [
                        "heading" => "Alarm System",
                        "slug" => "categoryelectricalcommunicationalarmsystem", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-electricallights">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Smoke Detectors",
                        "slug" => "categoryelectricallightssmokedetectors", 
                    ],
                    [
                        "heading" => "Interior",
                        "slug" => "categoryelectricallightsinterior", 
                    ],
                    [
                        "heading" => "Exterior",
                        "slug" => "categoryelectricallightsexterior", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-electricaloutlets">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Breakers/fuses",
                        "slug" => "categoryelectricaloutletsbreakersfuses", 
                    ],
                    [
                        "heading" => "Interior",
                        "slug" => "categoryelectricaloutletsinterior", 
                    ],
                    [
                        "heading" => "Exterior",
                        "slug" => "categoryelectricaloutletsexterior", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-house-exteriorroofgutters">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking",
                        "slug" => "categoryhouse-exteriorroofguttersleaking", 
                    ],
                    [
                        "heading" => "Needs repairing",
                        "slug" => "categoryhouse-exteriorroofguttersneedsrepairing", 
                    ],
                    [
                        "heading" => "Gutters",
                        "slug" => "categoryhouse-exteriorroofguttersgutters", 
                    ],
                    [
                        "heading" => "Snow",
                        "slug" => "categoryhouse-exteriorroofgutterssnow", 
                    ],
                    [
                        "heading" => "New Roof",
                        "slug" => "categoryhouse-exteriorroofguttersnewroof", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-house-exteriorexterior">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Needs Painting",
                        "slug" => "categoryhouse-exteriorexteriorneedspainting", 
                    ],
                    [
                        "heading" => "Bricks Damaged",
                        "slug" => "categoryhouse-exteriorexteriorbricksdamaged", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-house-exterioraccondenser">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Needs servicing",
                        "slug" => "categoryhouse-exterioraccondenserneedsservicing", 
                    ],
                    [
                        "heading" => "Not Working",
                        "slug" => "categoryhouse-exterioraccondensernotworking", 
                    ],
                    [
                        "heading" => "Damaged",
                        "slug" => "categoryhouse-exterioraccondenserdamaged", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-house-exteriorconcrete">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Sidewalk",
                        "slug" => "categoryhouse-exteriorconcretesidewalk", 
                    ],
                    [
                        "heading" => "Foundation",
                        "slug" => "categoryhouse-exteriorconcretefoundation", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-house-exteriordoorwindows">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Doors",
                        "slug" => "categoryhouse-exteriordoorwindowsdoors", 
                    ],
                    [
                        "heading" => "Windows",
                        "slug" => "categoryhouse-exteriordoorwindowswindows", 
                    ],
                    [
                        "heading" => "Mailbox",
                        "slug" => "categoryhouse-exteriordoorwindowsmailbox", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-householddoorswindows">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Interior Doors",
                        "slug" => "categoryhouseholddoorswindowsinteriordoors", 
                    ],
                    [
                        "heading" => "Windows",
                        "slug" => "categoryhouseholddoorswindowswindows", 
                    ],
                    [
                        "heading" => "Garage Door",
                        "slug" => "categoryhouseholddoorswindowsgaragedoor", 
                    ],
                    [
                        "heading" => "Entry Door",
                        "slug" => "categoryhouseholddoorswindowsentrydoor", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-householdcleaning">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Clean the whole house",
                        "slug" => "categoryhouseholdcleaningcleanthewholehouse", 
                    ],
                    [
                        "heading" => "Kitchen",
                        "slug" => "categoryhouseholdcleaningkitchen", 
                    ],
                    [
                        "heading" => "Bathrooms",
                        "slug" => "categoryhouseholdcleaningbathrooms", 
                    ],
                    [
                        "heading" => "Windows",
                        "slug" => "categoryhouseholdcleaningwindows", 
                    ],
                    [
                        "heading" => "Floors",
                        "slug" => "categoryhouseholdcleaningfloors", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-householdflooring">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Carpet / Tile",
                        "slug" => "categoryhouseholdflooringcarpettile", 
                    ],
                    [
                        "heading" => "Cleaning",
                        "slug" => "categoryhouseholdflooringcleaning", 
                    ],
                    [
                        "heading" => "Stairs",
                        "slug" => "categoryhouseholdflooringstairs", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-householdceiling">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking",
                        "slug" => "categoryhouseholdceilingleaking", 
                    ],
                    [
                        "heading" => "Paint",
                        "slug" => "categoryhouseholdceilingpaint", 
                    ],
                    [
                        "heading" => "Fan",
                        "slug" => "categoryhouseholdceilingfan", 
                    ],
                    [
                        "heading" => "Lights",
                        "slug" => "categoryhouseholdceilinglights", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-householdpestcontrol">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Outside",
                        "slug" => "categoryhouseholdpestcontroloutside", 
                    ],
                    [
                        "heading" => "Inside",
                        "slug" => "categoryhouseholdpestcontrolinside", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-householdwallscabinets">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Closet/shelves",
                        "slug" => "categoryhouseholdwallscabinetsclosetshelves", 
                    ],
                    [
                        "heading" => "Handrail",
                        "slug" => "categoryhouseholdwallscabinetshandrail", 
                    ],
                    [
                        "heading" => "Walls",
                        "slug" => "categoryhouseholdwallscabinetswalls", 
                    ],
                    [
                        "heading" => "Bathroom Cabinet",
                        "slug" => "categoryhouseholdwallscabinetsbathroomcabinet", 
                    ],
                    [
                        "heading" => "Kitchen Cabinet",
                        "slug" => "categoryhouseholdwallscabinetskitchencabinet", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-outdoorsgarbagerubbish">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Trash Can",
                        "slug" => "categoryoutdoorsgarbagerubbishtrashcan", 
                    ],
                    [
                        "heading" => "Remove Garbage",
                        "slug" => "categoryoutdoorsgarbagerubbishremovegarbage", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-outdoorslandscaping">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Lawn",
                        "slug" => "categoryoutdoorslandscapinglawn", 
                    ],
                    [
                        "heading" => "Trees",
                        "slug" => "categoryoutdoorslandscapingtrees", 
                    ],
                    [
                        "heading" => "Bushes",
                        "slug" => "categoryoutdoorslandscapingbushes", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-outdoorsfencingroof">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Gate",
                        "slug" => "categoryoutdoorsfencingroofgate", 
                    ],
                    [
                        "heading" => "Broken",
                        "slug" => "categoryoutdoorsfencingroofbroken", 
                    ],
                    [
                        "heading" => "Installation",
                        "slug" => "categoryoutdoorsfencingroofinstallation", 
                    ],
                    [
                        "heading" => "Painting",
                        "slug" => "categoryoutdoorsfencingroofpainting", 
                    ],
                    [
                        "heading" => "Roof",
                        "slug" => "categoryoutdoorsfencingroofroof", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-outdoorsparking">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Driveway",
                        "slug" => "categoryoutdoorsparkingdriveway", 
                    ],
                    [
                        "heading" => "Parking spot",
                        "slug" => "categoryoutdoorsparkingparkingspot", 
                    ],
                    [
                        "heading" => "Garage Access",
                        "slug" => "categoryoutdoorsparkinggarageaccess", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-outdoorspool">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Dirty",
                        "slug" => "categoryoutdoorspooldirty", 
                    ],
                    [
                        "heading" => "Pump",
                        "slug" => "categoryoutdoorspoolpump", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-outdoorsporchwalkways">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Mailbox",
                        "slug" => "categoryoutdoorsporchwalkwaysmailbox", 
                    ],
                    [
                        "heading" => "Porch",
                        "slug" => "categoryoutdoorsporchwalkwaysporch", 
                    ],
                    [
                        "heading" => "Sidewalk",
                        "slug" => "categoryoutdoorsporchwalkwayssidewalk", 
                    ],
                    [
                        "heading" => "Stairs",
                        "slug" => "categoryoutdoorsporchwalkwaysstairs", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-plumbingshowertub">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking",
                        "slug" => "categoryplumbingshowertubleaking", 
                    ],
                    [
                        "heading" => "No Water",
                        "slug" => "categoryplumbingshowertubnowater", 
                    ],
                    [
                        "heading" => "Valves",
                        "slug" => "categoryplumbingshowertubvalves", 
                    ],
                    [
                        "heading" => "Shower",
                        "slug" => "categoryplumbingshowertubshower", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-plumbingleak">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking from ceiling",
                        "slug" => "categoryplumbingleakleakingfromceiling", 
                    ],
                    [
                        "heading" => "Leaking from wall",
                        "slug" => "categoryplumbingleakleakingfromwall", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-plumbingsink">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking",
                        "slug" => "categoryplumbingsinkleaking", 
                    ],
                    [
                        "heading" => "Shut Off",
                        "slug" => "categoryplumbingsinkshutoff", 
                    ],
                    [
                        "heading" => "Water Issues",
                        "slug" => "categoryplumbingsinkwaterissues", 
                    ],
                    [
                        "heading" => "Sink Issues",
                        "slug" => "categoryplumbingsinksinkissues", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-plumbingsprinklers">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking pipe",
                        "slug" => "categoryplumbingsprinklersleakingpipe", 
                    ],
                    [
                        "heading" => "Sprinkles head",
                        "slug" => "categoryplumbingsprinklerssprinkleshead", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-third is-plumbingtoilet">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Define the problem</h2>
                <p class="form-wizard-description text-center">Please select the option below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Leaking",
                        "slug" => "categoryplumbingtoiletleaking", 
                    ],
                    [
                        "heading" => "Seat",
                        "slug" => "categoryplumbingtoiletseat", 
                    ],
                    [
                        "heading" => "Broken",
                        "slug" => "categoryplumbingtoiletbroken", 
                    ],
                    [
                        "heading" => "Tank",
                        "slug" => "categoryplumbingtoilettank", 
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">117</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
</div>