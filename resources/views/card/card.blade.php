<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
<div class="container" style="padding: 150px;">
    <h2 style="color: gray;">Student ID Card</h2>
    <form class="shadow p-4">
        <div class="row">
            <div class="col-md-4">
                <img src="https://picsum.photos/200/300" class="img-thumbnail" >
            </div>
            <div class="col-md-8">
                <p>{{ $student->name }}</p>
                <p>{{ $student->address }}</p>
                <p>{{ $student->city }}</p>
                <p>{{ $student->pincode }}</p>
                <p>{{ $student->mobileNumber }}</p>
            </div>
        </div>
        <div class="mb-3 pt-2">
            <label for="" class="form-label">First Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $student->name }}" readonly >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" id="" value="{{ $student->email }}" readonly >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Id</label>
            <input type="text" class="form-control" value="{{ $student->studentId }}" id="" readonly >
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

</html>
