<x-users.main.app-layout>
    <x-slot name="head">
        - Payment
    </x-slot>
    <x-tenants.navbar />
    <div class="is-tenant-banners pl1-5r">
        <div class="is-header-all-container">
            <div class="pt-20p hide">
                <ul class="banner-header-links">
                    <li class="banner-header-name">
                        <a href="index.html" class="banner-link-for-header">Home</a>
                    </li>
                    <li class="banner-header-name">
                        /<span class="banner-link-for-header for-normal">Make Payment</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="is-header-all-wrappers">
            <div class="is-header-all-wrappers">
                <div>
                    <h2 class="header-f0r-mobile text-center">Make Payment</h2>
                    <div class="is-header-all-wrappers padding">
                        <div class="is-header-all-container padding">
                            <form enctype="multipart/form-data" action="#" method="POST" enctype="multipart/form-data" id="paymentForm">
                                @csrf
                                <div class="admin">
                                    <h4 class="mb-1">Building</h4>
                                    <select class="form-control" name="building_id" required>
                                        <option value="{!! $rented_property->id !!}">{!! $buildingName !!}</option>
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
                                    <input class="form-control" type="month" name="month" value="{{ old('month', $defaultDate) }}"
                                        required />
                                    @error('month')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="invoice-container bill-mov active">
                                    <div class="invoice-row">
                                        <div class="col-invoice col-invoice-12">
                                            <div class="invoice-title">
                                                <h2>Invoice</h2>
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
                                                                        @if($paymentType == "Rent")
                                                                            @if(isset($due))
                                                                                <tr>
                                                                                    <td>Due Amount</td>
                                                                                    <td class="text-right" id="due-amount">Rs {!! number_format($due, 2) !!}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endif
                                                                        <tr>
                                                                            <td id="heading">@if($paymentType == "Sell") Sell @else Monthly House Rent @endif</td>
                                                                            <td class="text-right" id="monthly-house-rent">Rs {!! number_format($price, 2) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Electric Charge</td>
                                                                            <td class="text-right" id="electric-charge">Rs {!! number_format($chargeE, 2) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Water Charge</td>
                                                                            <td class="text-right" id="water-charge">Rs {!! number_format($chargeW, 2) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Garbage Charge</td>
                                                                            <td class="text-right" id="garbage-charge">Rs {!! number_format($chargeG, 2) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="thick-line text-center"><strong id="totalHead">Total</strong></td>
                                                                            <td class="thick-line text-right" id="total">Rs {!! number_format($allTotal, 2) !!}</td>
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
                                        <option value="{!! $paymentType !!}">{!! $paymentType !!}</option>
                                    </select>
                                    @error('payment_type')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="admin">
                                    <h4 class="mb-1">Amount</h4>
                                    <input name="amt_paid" placeholder="Write payment amount here..." class="form-control" required
                                        type="number" min="0" value="{!! $allTotal !!}" id="payment-amount" />
                                    @error('amt_paid')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <h4 class="mb-1">Pay with</h4>
                                    <button type="button" class="pay-btn" onclick="setPaypalRoute()"><img src="{!! asset('Images/Original/paypal-logo.svg') !!}" alt="" class="img-fluid"></button>  
                                    <button type="button" class="pay-btn" onclick="setStripeRoute()"><img src="{!! asset('Images/Original/stripe-logo.svg') !!}" alt="" class="img-fluid"></button>  
                                    <button type="button" id="payment-button" class="pay-btn"><img src="{!! asset('Images/Original/khalti-logo.svg') !!}" alt="" class="img-fluid"></button>  
                                    <button type="button" class="pay-btn" onclick="setEsewaRoute()"><img src="{!! asset('Images/Original/esewa_logo.png') !!}" alt="" class="img-fluid"></button>               
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-tenants.footer />
    <script>
        function setEsewaRoute() {
            document.getElementById('paymentForm').action = "{{ route('tenant.esewa.pay') }}";
            document.getElementById('paymentForm').submit();
        }
        function setPaypalRoute(){
            document.getElementById('paymentForm').action = "{{ route('tenant.paypal.pay') }}";
            document.getElementById('paymentForm').submit();
        }
        function setStripeRoute(){
            document.getElementById('paymentForm').action = "{{ route('tenant.stripe.pay') }}";
            document.getElementById('paymentForm').submit();
        }
    </script>
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_c04c30f5b52d433a8e659fedebed65c4",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI"
            ],
            "eventHandler": {
                onSuccess(payload) {
                    console.log(payload);
                    document.getElementById('paymentForm').action = "{!! route('tenant.khalti.pay') !!}";
                    document.getElementById('paymentForm').submit();
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };
    
        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function() {
            var amount = document.getElementById("payment-amount").value;
            checkout.show({
                amount: amount * 100
            });
        }
    </script>

</x-users.main.app-layout>