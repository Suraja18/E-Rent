<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $payment->rentedProperty->rentProperty->building->name !!} - Invoice</title>
    <style>
        .invoice-container {
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .invoice-row {
            margin-left: -15px;
            margin-right: -15px;
        }

        .col-invoice {
            position: relative;
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
            float: left;
        }

        .col-invoice-12 {
            width: 100%;
        }

        .col-invoice-6 {
            width: 50%;
        }

        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .invoice-title-right {
            float: right;
        }

        .invoice-address {
            margin-bottom: 20px;
            font-style: normal;
            line-height: 1.43;
        }

        .float-right {
            float: right !important;
            width: auto;
        }

        .invoice-panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .panel-invoice {
            border-color: #ddd;
        }

        .panel-invoice>.invoice-panel-heading {
            color: #333;
            background-color: #f5f5f5;
            border-color: #ddd;
        }

        .invoice-panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        .invoice-panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 16px;
        }

        .invoice-panel-body {
            padding: 15px;
        }

        .invoice-responsive table {
            border-collapse: collapse;
            border-spacing: 0;
            max-width: 100%;
            background-color: transparent;
            width: 100%;
            margin-bottom: 20px;
        }

        .invoice-responsive td {
            padding: 0;
        }

        .invoice-responsive table>thead:first-child>tr:first-child>td {
            border-top: 0;
        }

        .invoice-responsive tr {
            display: table-row !important;
        }

        .invoice-responsive table>tbody>tr>td,
        .invoice-responsive table>thead>tr>td {
            padding: 5px;
            line-height: 1.43;
            vertical-align: top;
            border-top: 1px solid #ddd;
            background-color: transparent;
            display: table-cell !important;
        }

        .invoice-responsive table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .invoice-panel-body::before,
        .invoice-container::before,
        .invoice-row::before {
            content: " ";
            display: table;
        }

        .invoice-panel-body::after,
        .invoice-container::after,
        .invoice-row::after {
            content: " ";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 576px) {
            .invoice-panel-body {
                padding: 0;
            }
        }

        @media screen and (min-width: 768px) {
            .invoice-container {
                width: 98%;
            }
        }

        @media screen and (max-width: 768px) {
            .invoice-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                overflow-x: scroll;
                border: 1px solid #ddd;
            }

            .invoice-responsive>table {
                margin-bottom: 0;
            }

            .invoice-responsive table>thead>tr>td {
                white-space: nowrap;
            }
        }

        @media screen and (max-width: 1024px) {
            .invoice-responsive td:first-child {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-row">
            <div class="col-invoice col-invoice-12">
                <div class="invoice-title">
                    <h2>Invoice</h2>
                    <h3 class="invoice-title-right"># {!! $payment->id !!}</h3>
                </div>
                <hr />
                <div class="invoice-row" style="height: 120px;">
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
                                            @if ($payment->payment_type == 'Rent')
                                                @if (isset($remainToPay))
                                                    <tr>
                                                        <td>Previous Due</td>
                                                        <td class="text-right">{!! number_format($remainToPay, 2) !!}</td>
                                                    </tr>
                                                @endif
                                            @endif
                                            <tr>
                                                @if ($rented->rentProperty->type == 'Rent')
                                                    <td>Monthly House Rent</td>
                                                    <td class="text-right">{!! number_format($rented->rentProperty->monthly_house_rent - $rented->discount, 2) !!}</td>
                                                @else
                                                    <td>Sell price</td>
                                                    <td class="text-right">{!! number_format($rented->rentProperty->price - $rented->discount, 2) !!}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Electric Charge</td>
                                                <td class="text-right">{!! number_format($rented->rentProperty->electric_charge, 2) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Water Charge</td>
                                                <td class="text-right">{!! number_format($rented->rentProperty->water_charge, 2) !!}</td>
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
                                                <td class="text-right">{!! number_format($payment->amt_paid, 2) !!}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><strong>Remaining</strong></td>
                                                <td class="text-right">{!! number_format($remainToPay + $rentPrice - $payment->amt_paid, 2) !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-row" style="margin-top: 400px;">
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
</body>

</html>
