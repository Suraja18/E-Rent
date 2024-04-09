<x-users.main.app-layout>
    <x-slot name="head">
        - All Payment
    </x-slot>
    <x-tenants.navbar />
    
     <!-- Start Banners -->
     <div class="is-tenant-banners">
        <div class="is-header-all-container">
            <div class="pt-20p hide">
                <ul class="banner-header-links">
                    <li class="banner-header-name">
                        <a href="{!! route('tenant.dashboard') !!}" class="banner-link-for-header">Home</a>
                    </li>
                    <li class="banner-header-name">
                        /<a href="{!! route('tenant.payment_history') !!}" class="banner-link-for-header"> Payment</a>
                    </li>
                    <li class="banner-header-name">
                        /<span class="banner-link-for-header for-normal">{!! $payment->id !!}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="is-header-all-wrappers">
            <div class="is-header-all-wrappers">
                <div>
                    <div class="is-header-all-wrappers padding">
                        <div class="is-header-all-container padding">
                            <div class="invoice-container">
                                <div class="invoice-row">
                                    <div class="col-invoice col-invoice-6 float-right">
                                        <a href="{!! route('tenant.payment.pdf.download', $payment->id) !!}" class="view-more-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                                        </a>
                                    </div>
                                    <div class="col-invoice col-invoice-12">
                                        <div class="invoice-title">
                                            <h2>Invoice</h2>
                                            <h3 class="invoice-title-right"># {!! $payment->id !!}</h3>
                                        </div>
                                        <hr />
                                        <div class="invoice-row">
                                            <div class="col-invoice col-invoice-6">
                                                <p class="invoice-address">
                                                    <strong>Tenants:</strong><br />
                                                        {!! $payment->rentedProperty->tenant->first_name !!} {!! $payment->rentedProperty->tenant->last_name !!}<br />
                                                        {!! $payment->rentedProperty->tenant->address !!}<br />
                                                        {!! $payment->rentedProperty->tenant->phone_number !!}
                                                </p>
                                            </div>
                                            <div class="col-invoice col-invoice-6 float-right">
                                                <p class="invoice-address">
                                                    <strong>Landlord:</strong><br>
                                                        {!! $payment->rentedProperty->rentProperty->landlord->first_name !!} {!! $payment->rentedProperty->rentProperty->landlord->last_name !!}<br>
                                                        {!! $payment->rentedProperty->rentProperty->landlord->address !!}<br>
                                                        {!! $payment->rentedProperty->rentProperty->landlord->phone_number !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="invoice-row">
                                            <div class="col-invoice col-invoice-12">
                                                <div class="invoice-panel panel-invoice">
                                                    <div class="invoice-panel-heading">
                                                        <h3 class="invoice-panel-title">Order Summary</h3>
                                                    </div>
                                                    <div class="invoice-panel-body">
                                                        <div class="invoice-responsive">
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <td><strong>Item</strong></td>
                                                                        <td class="text-right"><strong>Total</strong></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if($payment->payment_type == "Rent")
                                                                        @if (isset($remainToPay))
                                                                            <tr>
                                                                                <td>Previous Due</td>
                                                                                <td class="text-right">{!! number_format($remainToPay,2) !!}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                    <tr>
                                                                        @if($rented->rentProperty->type == "Rent")
                                                                            <td>Monthly House Rent</td>
                                                                            <td class="text-right">{!! number_format($rented->rentProperty->monthly_house_rent - $rented->discount,2)  !!}</td>
                                                                        @else
                                                                            <td>Sell price</td>
                                                                            <td class="text-right">{!! number_format($rented->rentProperty->price - $rented->discount,2)  !!}</td>
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Electric Charge</td>
                                                                        <td class="text-right">{!! number_format($rented->rentProperty->electric_charge,2) !!}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Water Charge</td>
                                                                        <td class="text-right">{!! number_format($rented->rentProperty->water_charge,2) !!}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Garbage Charge</td>
                                                                        <td class="text-right">{!! number_format($rented->rentProperty->garbage_charge, 2) !!}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="thick-line text-center"><strong>Total</strong></td>
                                                                        <td class="thick-line text-right">{!! number_format($remainToPay + $rentPrice, 2) !!}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center"><strong>Amount Paid</strong></td>
                                                                        <td class="text-right">{!! number_format($payment->amt_paid,2) !!}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center"><strong>Remaining</strong></td>
                                                                        <td class="text-right">{!! number_format($remainToPay + $rentPrice - $payment->amt_paid,2) !!}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-row">
                                            <div class="col-invoice col-invoice-6">
                                                <p class="invoice-address">
                                                    <strong>Payment Method:</strong><br />
                                                        {!! $payment->payment_mode !!}<br />
                                                        {!! $payment->status !!}
                                                </p>
                                            </div>
                                            <div class="col-invoice col-invoice-6 float-right">
                                                <p class="invoice-address">
                                                    <strong>Payment Type:</strong><br>
                                                    {!! $payment->payment_type !!}
                                                </p>
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
</x-users.main.app-layout>
    