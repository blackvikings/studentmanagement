<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title></title>
    <style>
        @media print {
            #print-btn, title {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <form class="shadow p-4">
        <div id="print-content">
            <h2 style="color: gray; text-align: center;">{{ $student->heading }}</h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset(str_replace("public", "",$student->image)) }}" width="200" height="300" class="img-thumbnail" alt="...">
                </div>
                <div class="col-md-8">
                    <p>{{ $student->name }}</p>
                    <p>{{ $student->studentId }}</p>
                    <p>{{ date('d-m-Y', strtotime($student->dateOfBirth)) }}</p>
                    <p>{{ $student->address }}</p>
                    <p>{{ $student->mobileNumber }}</p>
                </div>
            </div>
            <div class="mb-2 pt-2">
                <label>Name :-</label>
                <strong><span style="color: red">{{ $student->name }}</span></strong>
            </div>
            <div class="mb-2">
                <label>Address:-</label><strong><span style="color: red;"> {{ $student->address }}</span></strong>
            </div>
            <div class="mb-2">
                <label>Class:-</label><strong><span style="color: red">{{ $student->studentClasses->name }}</span></strong>
            </div>
            <div class="mb-2">
                <label>Father's name:-</label><strong><span style="color: red;">{{ $student->fatherName }}</span></strong>
            </div>
            <div class="mb-2">
                <label>Parent's mobile:-</label><strong><span style="color: red">{{ $student->parentsMobileNumber }}</span></strong>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="print-btn" onClick="window.print()">Print</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
</script>
</body>

</html>
