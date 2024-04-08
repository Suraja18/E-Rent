<x-users.main.app-layout>
    <x-slot name="head">
        - About Us
    </x-slot>
    <x-users.navbar />

    <div class="invoice-container">
        <div class="invoice-row">
            <div class="col-invoice col-invoice-12">
                <div class="invoice-title">
                    <h2>Invoice</h2>
                    <h3 class="invoice-title-right">Order # 12345</h3>
                </div>
                <hr />
                <div class="invoice-row">
                    <div class="col-invoice col-invoice-6">
                        <p class="invoice-address">
                            <strong>Billed To:</strong><br />
                                John Smith<br />
                                1234 Main<br />
                                Apt. 4B<br />
                                Springfield, ST 54321
                        </p>
                    </div>
                    <div class="col-invoice col-invoice-6 float-right">
                        <p class="invoice-address">
                            <strong>Shipped To:</strong><br>
                                Jane Smith<br>
                                1234 Main<br>
                                Apt. 4B<br>
                                Springfield, ST 54321
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
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-right"><strong>Total</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>BS-200</td>
                                                <td class="text-center">$10.99</td>
                                                <td class="text-center">1</td>
                                                <td class="text-right">$10.99</td>
                                            </tr>
                                            <tr>
                                                <td>BS-400</td>
                                                <td class="text-center">$20.00</td>
                                                <td class="text-center">3</td>
                                                <td class="text-right">$60.00</td>
                                            </tr>
                                            <tr>
                                                <td>BS-1000</td>
                                                <td class="text-center">$600.00</td>
                                                <td class="text-center">1</td>
                                                <td class="text-right">$600.00</td>
                                            </tr><tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center"><strong>Total</strong></td>
                                                <td class="thick-line text-right">$670.99</td>
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
                                Visa ending **** 4242<br />
                                jsmith@email.com
                        </p>
                    </div>
                    <div class="col-invoice col-invoice-6 float-right">
                        <p class="invoice-address">
                            <strong>Order Date:</strong><br>
                            March 7, 2014
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-users.footer />

</x-users.main.app-layout>