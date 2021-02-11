@php
    //dd($fee->toArray());
    $total = 0;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $fee->heading }} - Invoice</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            Invoice
            <strong>{{ date('d-m-Y') }}</strong>
            <span class="float-right"> <strong>Status:</strong> {{ $fee->paymentStatus }}</span>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong>{{ $fee->heading }}</strong>
                    </div>
                    <div>Madalinskiego 8</div>
                    <div>71-101 Szczecin, Poland</div>
                    <div>Email: info@dotnettec.com</div>
                    <div>Phone: +91 9800000000</div>
                </div>
                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    @if($fee->feeType != 'Medical bill')
                        <div>
                            <strong> {{ $fee->students->name }}</strong>
                        </div>
                    @else
                        <div>
                            <strong> {{ $fee->peasant_name }}</strong>
                        </div>
                    @endif
                    @if($fee->feeType != 'Medical bill')
                        <div>Attn: {{ $fee->students->fatherName }}</div>
                    @endif
                    @if($fee->feeType != 'Medical bill')
                        <div> {{ $fee->students->address }} </div>
                    @else
                        <div>{{ $fee->peasant_name }}</div>
                    @endif
                    @if($fee->feeType != 'Medical bill')
                        <div>Email: {{ $fee->students->email }}</div>
                        <div>Phone: +91{{ $fee->students->mobileNumber }}</div>
                    @endif
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        @if($fee->feeType != 'Medical bill')
                            <th>Fee Category</th>
                            <th>Fee Items</th>
                            <th class="right">Total</th>
                        @else
                            <th>Fee name</th>
                            <th>Description</th>
                            <th>Amount</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @if($fee->feeType != 'Medical bill')
                            @foreach($fee->category as $category)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                @foreach($category->items as $item)
                                    @if($loop->index >= 1 )
                                        <tr>
                                            <td></td>
                                            <td></td>
                                    @endif
                                        <td>{{ $item->name }}</td>
                                        <td class="amount">{{ $item->amount }}</td>
                                            @php
                                                $total = $total+$item->amount;
                                            @endphp
                                    @if($loop->index >= 1 )
                                            </tr>
                                    @endif
                                @endforeach
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="center">1</td>
                                <td class="left strong">{{ $fee->feeName }}</td>
                                <td class="left">{{ $fee->description }}</td>
                                <td class="right">{{ $fee->amount }}</td>
                                @php
                                     $total = $total+$fee->amount;
                                @endphp
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Subtotal</strong>
                            </td>
                            <td class="right">{{ $total }}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Total</strong>
                            </td>
                            <td class="right">
                                <strong>{{ $total }}</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <button class="btn btn-primary" id="printPageButton" onclick="window.print();">Print</button>
        </div>
    </div>
</div>

</body>
</html>
