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

        <h1>Edit Data</h1>
        <hr>
        <!-- back button -->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('scl.index') }}">BACK</a>
        </div>

        <form action="{{ route('scl.update',$scl->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- school name -->
            <div class="mb-3">
                <label for="exampleFormControltext" class="form-label">School Name :</label>
                <input class="form-control" type="text" aria-label="default input example" name="school" value="{{ $scl->school}}">
            </div>
            <hr>
            <!-- school Address -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">ADDRESS</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{ $scl->address}}
                </textarea>
            </div>
            <hr>
            <!-- School Type -->
            <div class="form-check">
               <h6>School Type :</h6>
                <input class="form-check-input" type="radio" id="flexRadioDefault1" value="private" name="type" @if ($scl->type =='private') checked @endif>
                <label class="form-check-label" for="flexRadioDefault1" >
                    Private
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="type" value="goverment" @if ($scl->type =='goverment') checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                    Goverment
                </label>
            </div>
            <hr>
            <!-- facility -->

            @php
                $facility = explode(',',$scl->facility);
                $checked = "checked";
            @endphp

            <h6>School Facility :</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="Play_Ground" name="facility[]" value="Play Ground" @if(in_array("Play Ground",$facility)) {{$checked}} @endif>
                <label class="form-check-label" for="Play Ground">Play Ground </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Pray Hall" id="Pray Hall" name="facility[]" @if(in_array("Pray Hall",$facility)) {{$checked}} @endif>
                <label class="form-check-label" for="Pray Hall">Pray Hall</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Staff-Room/Class-Room" id="Staff-Room/Class-Room" name="facility[]" @if(in_array("Staff-Room/Class-Room",$facility)) {{$checked}} @endif>
                <label class="form-check-label" for="Staff-Room/Class-Room">Staff-Room/Class-Room</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Computer lab" id="Computer lab" name="facility[]"  @if(in_array("Computer lab",$facility)) {{$checked}} @endif>
                <label class="form-check-label" for="Computer lab">Computer lab</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Science lab" id=" Science lab" name="facility[]" @if(in_array("Science lab",$facility)) {{$checked}} @endif>
                <label class="form-check-label" for="Science lab">Science lab</label>
            </div>
            
            <hr>
            <!-- school feedback -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">feedback</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback">{{ $scl->feedback}}</textarea>
            </div>

               <!-- profile -->
               <div class="mb-3">
               <img src="{{ URL::to('/') }}/scl_profile/{{ $scl->profile }}" alt="scl profile" style="width:150px; height:150px;">
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