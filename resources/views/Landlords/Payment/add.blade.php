<x-users.main.app-layout>
    <x-slot name="head">
        - Add Payment
    </x-slot>
    <x-landlords.sidebar />

    <x-landlords.navbar />

    <x-landlords.banners>
        <x-slot name="withhead">
            <li class="banner-header-name">
                /<a href="{{ route('payment.index') }}" class="banner-link-for-header"> Payment</a>
            </li>
        </x-slot>
        <x-slot name="name">Add Payment</x-slot>
    </x-landlords.banners>
                           
    <x-landlords.new-body>
        <form enctype="multipart/form-data" action="{{ route('payment.store') }}" method="POST">
            @csrf

            <div class="admin">
                <h4 class="mb-1">Tenants</h4>
                <select class="form-control" name="tenant_id" id="tenant-select" required>
                    <option value="">Select Tenant...</option>
                    @foreach ($tenants as $tenant)
                        <option value="{!! $tenant->id !!}">{!! $tenant->first_name !!} {!! $tenant->last_name !!}</option>
                    @endforeach
                </select>
                @error('tenant_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="admin">
                <h4 class="mb-1">Building</h4>
                <select class="form-control" id="building-select" name="building" required>
                    <option value="">Select Building...</option>
                </select>
                @error('building')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            

            <div class="admin">
                <h4 class="mb-1">Month of</h4>
                @php
                    $defaultDate = date('Y-m', strtotime('-1 month'));
                    $defaultMonthYear = date('F-Y', strtotime($defaultDate));
                @endphp
                <input class="form-control" type="month" name="month" value="{{ old('month', $defaultDate) }}" required />
                @error('month')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="invoice-container bill-mov">
                <div class="invoice-row">
                    <div class="col-invoice col-invoice-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2>
                            <h3 class="invoice-title-right"># 12345</h3>
                        </div>
                        <hr />
                        <div class="invoice-row">
                            <div class="col-invoice col-invoice-12">
                                <div class="invoice-panel panel-invoice">
                                    <div class="invoice-panel-heading">
                                        <h3 class="invoice-panel-title">Invoice Summary</h3>
                                    </div>
                                    <div class="invoice-panel-body">
                                        <div class="invoice-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td><strong>Description</strong></td>
                                                        <td class="text-right"><strong>Price</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="heading">Monthly House Rent</td>
                                                        <td class="text-right" id="monthly-house-rent">Rs 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Electric Charge</td>
                                                        <td class="text-right" id="electric-charge">Rs 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Water Charge</td>
                                                        <td class="text-right" id="water-charge">Rs 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garbage Charge</td>
                                                        <td class="text-right" id="garbage-charge">Rs 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="thick-line text-center"><strong>Total</strong></td>
                                                        <td class="thick-line text-right" id="total">Rs 0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="admin">
                <h4 class="mb-1">Payment Type</h4>
                <select class="form-control" name="payment_type" required>
                    <option value="">Select Payment Type...</option>
                    <option value="Deposit">Deposit</option>
                    <option value="Rent">Rent</option>
                    <option value="Sell">Sell</option>
                    <option value="Due">Due</option>
                </select>
                @error('payment_type')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="admin">
                <div class="add-img-container">
                    <div class="add-flex-2">
                        <h4 class="mb-1">Amount</h4>
                        <input name="amt_paid" placeholder="Write payment amount here..." class="form-control" required type="number" min="0" />
                        @error('amt_paid')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="add-flex-2">
                        <h4 class="mb-1">Payment Mode</h4>
                        <select class="form-control" name="payment_mode" required>
                            <option value="">Select payment mode...</option>
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Remaining">Remaining</option>
                        </select>
                        @error('payment_mode')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <x-common.input-text-100>
                <x-slot name="column">Remarks</x-slot>
            </x-common.input-text-100>

            <div class="text-center">
                <input type="submit" value="Put on Rent" class="is-button-for-edit-profile is-hovers" />
            </div>
        </form>
    </x-landlords.new-body>


    
    <x-landlords.footer />  
    
    


    <script>
        $(document).ready(function () {
            $('#tenant-select').change(function () {
                var tenantId = $(this).val();
    
                $.ajax({
                    url: "{{ route('get.buildings') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'tenant_id': tenantId
                    },
                    success: function (data) {
                        $('#building-select').empty();
                        $('#building-select').append('<option value="">Select Building...</option>');
                        $.each(data, function (index, building) {
                            $('#building-select').append('<option value="' + building.id + '">' + building.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
<script>

    $(document).ready(function () {
        $('#building-select').change(function () {
            var buildingId = $(this).val();

            $.ajax({
                url: "{{ route('get.rented_properties') }}",
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'building_id': buildingId
                },
                success: function (data) {
                    populateInvoice(data);
                }
            });
        });

        function populateInvoice(data) {
            $('.invoice-container.bill-mov').addClass('active');
            if(data.sell_price == 0)
            {
                $('#monthly-house-rent').text('Rs ' + data.monthly_house_rent);
                $('#heading').text('Monthly House Rent');
            }else if(data.monthly_house_rent == 0){
                $('#monthly-house-rent').text('Rs ' + data.sell_price);
                $('#heading').text('House Sell');
            }
            
            $('#electric-charge').text('Rs ' + data.electric_charge);
            $('#water-charge').text('Rs ' + data.water_charge);
            $('#garbage-charge').text('Rs ' + data.garbage_charge);
            if(data.sell_price == 0)
            {
                $('#total').text('Rs ' + data.total);
            }else if(data.monthly_house_rent == 0){
                $('#total').text('Rs ' + data.sell_price);
            }
            
        }
    });
</script>

    
    
</x-users.main.app-layout>