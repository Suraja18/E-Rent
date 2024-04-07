<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Property Details</title>
    <style>
        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .table>tbody>tr>.no-line {
            border-top: none;
        }

        .table>thead>tr>.no-line {
            border-bottom: none;
        }

        .table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>Property Rent Details</h2>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Building Name:</strong>
                            {!! $property->building->name !!} @if(isset($property->rent_name)) / {!! $property->rent_name !!} @endif<br>
                            {!! $property->unit->building_unit !!}<br>
                            <strong>Address: </strong>
                            {!! $property->building->address !!}
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Landlord Details:</strong>
                            {!! $property->landlord->first_name !!} {!! $property->landlord->last_name !!}<br>
                            {!! $property->landlord->phone_number !!}<br>
                            {!! $property->landlord->email !!}<br>
                            <strong>Agreement Name: </strong>
                            {!! $property->forum->heading !!}
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Rent Status:</strong>
                            {!! $property_rent->status !!}<br>
                            <strong>Payment Status:</strong>
                            {!! "unpaid" !!}<br>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Availability:</strong><br/>
                            <strong>Area: </strong>{!! $property->area !!}<br/>
                            @if(($property->type == "Rent"))
                                <strong>Bed: </strong>{!! $property->no_of_bed !!}<br/>
                                <strong>Floor: </strong>{!! $property->floor !!}<br/>
                            @endif
                            <br><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Price summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(($property->type == "Rent"))
                                    <tr>
                                        <td>Rent</td>
                                        <td class="text-center">{!! $property->monthly_house_rent !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Electric Charge</td>
                                        <td class="text-center">{!! $property->electric_charge !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Water Charge</td>
                                        <td class="text-center">{!! $property->water_charge !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Garbage Charge</td>
                                        <td class="text-center">{!! $property->garbage_charge !!}</td>
                                    </tr>
                                    @php
                                        $totalcharge = $property->monthly_house_rent + $property->electric_charge + $property->water_charge + $property->garbage_charge;
                                    @endphp
                                    <tr>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right">{!! $totalcharge !!}</td>
                                    </tr>
                                    @endif
                                    @if(($property->type == "Sell"))
                                    <tr>
                                        <td>Buy</td>
                                        <td class="text-center">{!! $property->price !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right">{!! $property->price !!}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
