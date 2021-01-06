
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DotNetTec - Invoice html template bootstrap</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
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
                        <strong>DotNetTec</strong>
                    </div>
                    <div>Madalinskiego 8</div>
                    <div>71-101 Szczecin, Poland</div>
                    <div>Email: info@dotnettec.com</div>
                    <div>Phone: +91 9800000000</div>
                </div>
                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    <div>
                        <strong>Robert Maxwel</strong>
                    </div>
                    <div>Attn: Daniel Marek</div>
                    <div>43-190 Mikolow, Poland</div>
                    <div>Email: robert@daniel.com</div>
                    <div>Phone: +48 123 456 349</div>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Fee name</th>
                        <th>Description</th>
                        <th class="right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="center">1</td>
                        <td class="left strong">{{ $fee->feeName }}</td>
                        <td class="left">{{ $fee->description }}</td>
                        <td class="right">{{ $fee->amount }}</td>
                    </tr>
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
                            <td class="right">{{ $fee->amount }}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Total</strong>
                            </td>
                            <td class="right">
                                <strong>{{ $fee->amount }}</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
