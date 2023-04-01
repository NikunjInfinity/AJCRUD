<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CREATE</title>
</head>

<body>
    <div class="container">

        <h1>Insert Data</h1>
        <hr>

        <form method="POST" action="{{ route('scl.store') }}" enctype="multipart/form-data">
            @csrf


            <!-- school name -->
            <div class="mb-3">
                <label for="exampleFormControltext" class="form-label">School Name :</label>
                <input class="form-control" type="text" placeholder="Enter School Name" aria-label="default input example" name="school">
            </div>
            <hr>
            <!-- school Address -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">ADDRESS</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
            </div>
            <hr>
            <!-- School Type -->
            <div class="form-check">
                <h6>School Type :</h6>
                <input class="form-check-input" type="radio" id="flexRadioDefault1" value="private" name="type">
                <label class="form-check-label" for="flexRadioDefault1">
                    Private
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="type" value="goverment" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Goverment
                </label>
            </div>
            <hr>
            <!-- facility -->
            <h6>School Facility :</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Play Ground" id="Play Ground" name="facility[]">
                <label class="form-check-label" for="Play Ground">Play Ground </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Pray Hall" id="Pray Hall" name="facility[]">
                <label class="form-check-label" for="Pray Hall">Pray Hall</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Staff-Room/Class-Room" id="Staff-Room/Class-Room" name="facility[]" checked>
                <label class="form-check-label" for="Staff-Room/Class-Room">Staff-Room/Class-Room</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Computer lab" id="Computer lab" name="facility[]">
                <label class="form-check-label" for="Computer lab">Computer lab</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Science lab" id=" Science lab" name="facility[]">
                <label class="form-check-label" for="Science lab">Science lab</label>
            </div>

            <hr>
            <!-- school feedback -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">feedback</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback"></textarea>
            </div>

            <!-- profile -->
            <div class="mb-3">
                <input type="file" class="form-control" aria-label="file example" name="profile">
                <div class="invalid-feedback">Upload profile</div>
            </div>

            <!-- submit -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>