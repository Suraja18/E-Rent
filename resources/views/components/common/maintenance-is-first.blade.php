<div class="wizard-steps active is-first" role="listitem">
    <div>
        <div class="wizard-titles">
            <div class="text-center">
                <h2 class="form-wizard-title text-center">What is this request about?</h2>
                <p class="form-wizard-description text-center">Start selecting the category to define the issue or use the smart search.</p>
            </div>
        </div>
        <div class="category-wizard-sub-title">
            <div class="wizard-rows">
                @php
                    $datas = [
                        [
                            "image" => 'Images/Original/Request/AppliancesCategory.svg',
                            "heading" => "Appliance",
                            "desc" => "Stove, dishwasher, fridge, heating & cooling",
                            "slug" => "appliance", 
                        ],
                        [
                            "image" => 'Images/Original/Request/ElectricalCategory.svg',
                            "heading" => "Electrical",
                            "desc" => "Lights, outlets, breakers, telephone systems", 
                            "slug" => "electrical",
                        ],
                        [
                            "image" => 'Images/Original/Request/HouseExteriorCategory.svg',
                            "heading" => "House Exterior",
                            "desc" => "Roof, doors, windows, air conditioning",
                            "slug" => "house-exterior", 
                        ],
                        [
                            "image" => 'Images/Original/Request/HouseholdCategory.svg',
                            "heading" => "Household",
                            "desc" => "Doors, windows, closets, flooring, pest control",
                            "slug" => "household",
                        ],
                        [
                            "image" => 'Images/Original/Request/OutdoorsCategory.svg',
                            "heading" => "Outdoors",
                            "desc" => "Landscaping, fencing, pool, porch, parking",
                            "slug" => "outdoors",
                        ],
                        [
                            "image" => 'Images/Original/Request/PlumbingCategory.svg',
                            "heading" => "Plumbing",
                            "desc" => "Drains, faucets, pipes, pumps, sprinkler systems",
                            "slug" =>  "plumbing",
                        ],
                    ];
                @endphp
                
                @foreach ($datas as $data)
                    <div class="wizard-rows-card p-r">
                        <div>
                            <div class="wizard-radio">
                                <input type="radio" name="115" class="empty-radio" id="category{!! $data['slug'] !!}">
                                <label for="category{!! $data['slug'] !!}">
                                    <div class="wizard-radio-icons">
                                        <img src="{!! asset($data['image']) !!}" alt="Radio Icons" class="wizard-radio-image">
                                    </div>
                                    <h3 class="wizard-radio-title">{!! $data['heading'] !!}</h3>
                                    <p class="wizard-radio-description">{!! $data['desc'] !!}</p>
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>