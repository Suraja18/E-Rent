<div class="wizard-steps is-second" role="listitem">
    
    <div class="sub-form-category-list is-sec is-house-exterior">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Please specify the request</h2>
                <p class="form-wizard-description text-center">Select the sub-category of the issue below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "A/C Condenser",
                        "slug" => "categoryhouse-exterioraccondenser", 
                    ],
                    [
                        "heading" => "Concrete",
                        "slug" => "categoryhouse-exteriorconcrete",
                    ],
                    [
                        "heading" => "Door & Windows",
                        "slug" => "categoryhouse-exteriordoorwindows", 
                    ],
                    [
                        "heading" => "Roof & Gutters",
                        "slug" => "categoryhouse-exteriorroofgutters",
                    ],
                    [
                        "heading" => "Exterior",
                        "slug" => "categoryhouse-exteriorexterior",
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">116</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-sec is-electrical">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Please specify the request</h2>
                <p class="form-wizard-description text-center">Select the sub-category of the issue below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Ceiling Fan",
                        "slug" => "categoryelectricalceilingfan", 
                    ],
                    [
                        "heading" => "Communication",
                        "slug" => "categoryelectricalcommunication",
                    ],
                    [
                        "heading" => "Lights",
                        "slug" => "categoryelectricallights", 
                    ],
                    [
                        "heading" => "Outlets",
                        "slug" => "categoryelectricaloutlets",
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">116</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-sec is-appliance">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Please specify the request</h2>
                <p class="form-wizard-description text-center">Select the sub-category of the issue below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Dishwasher",
                        "slug" => "categoryappliancedishwasher", 
                    ],
                    [
                        "heading" => "Heating & Cooling",
                        "slug" => "categoryapplianceheatingcooling",
                    ],
                    [
                        "heading" => "Laundry / Vendor",
                        "slug" => "categoryappliancelaundryvendor", 
                    ],
                    [
                        "heading" => "Oven / Stove",
                        "slug" => "categoryapplianceovenstove",
                    ],
                    [
                        "heading" => "Refrigerator",
                        "slug" => "categoryappliancerefrigerator",
                    ],
                    [
                        "heading" => "Water Heater",
                        "slug" => "categoryappliancewaterheater",
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">116</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-sec is-household">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Please specify the request</h2>
                <p class="form-wizard-description text-center">Select the sub-category of the issue below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Ceiling",
                        "slug" => "categoryhouseholdceiling", 
                    ],
                    [
                        "heading" => "Cleaning",
                        "slug" => "categoryhouseholdcleaning",
                    ],
                    [
                        "heading" => "Doors & Windows",
                        "slug" => "categoryhouseholddoorswindows", 
                    ],
                    [
                        "heading" => "Flooring",
                        "slug" => "categoryhouseholdflooring",
                    ],
                    [
                        "heading" => "Pest Control",
                        "slug" => "categoryhouseholdpestcontrol",
                    ],
                    [
                        "heading" => "Walls & Cabinets",
                        "slug" => "categoryhouseholdwallscabinets",
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">116</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-sec is-outdoors">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Please specify the request</h2>
                <p class="form-wizard-description text-center">Select the sub-category of the issue below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Garbage / Rubbish",
                        "slug" => "categoryoutdoorsgarbagerubbish", 
                    ],
                    [
                        "heading" => "Landscaping",
                        "slug" => "categoryoutdoorslandscaping",
                    ],
                    [
                        "heading" => "Fencing & Roof",
                        "slug" => "categoryoutdoorsfencingroof", 
                    ],
                    [
                        "heading" => "Parking",
                        "slug" => "categoryoutdoorsparking",
                    ],
                    [
                        "heading" => "Pool",
                        "slug" => "categoryoutdoorspool",
                    ],
                    [
                        "heading" => "Porch & Walkways",
                        "slug" => "categoryoutdoorsporchwalkways",
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">116</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sub-form-category-list is-sec is-plumbing">
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">Please specify the request</h2>
                <p class="form-wizard-description text-center">Select the sub-category of the issue below.</p>
            </div>
        </div>
        <div>
            @php
                $datas = [
                    [
                        "heading" => "Shower / Tub",
                        "slug" => "categoryplumbingshowertub", 
                    ],
                    [
                        "heading" => "Leak",
                        "slug" => "categoryplumbingleak",
                    ],
                    [
                        "heading" => "Sink",
                        "slug" => "categoryplumbingsink",
                    ],
                    [
                        "heading" => "Sprinklers",
                        "slug" => "categoryplumbingsprinklers",
                    ],
                    [
                        "heading" => "Toilet",
                        "slug" => "categoryplumbingtoilet",
                    ],
                ];
            @endphp
            <div class="wizard-rows">
                @foreach ($datas as $data)
                    <x-common.maintenance-is-with>
                        <x-slot name="heading">{!! $data['heading'] !!}</x-slot>
                        <x-slot name="slug">{!! $data['slug'] !!}</x-slot>
                        <x-slot name="name">116</x-slot>
                    </x-common.maintenance-is-with>
                @endforeach
            </div>
        </div>
    </div>
</div>