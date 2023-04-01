<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Index</title>
</head>

<body>
    <div class="container pt-5">
        <!-- add school -->
        <a class="btn btn-info" href="{{ Route('scl.create')}}">ADD NEW SCHOOL</a>

        <!-- school data on index -->

        <table class="table">

            <thead>
                <tr>
                    <th>school</th>
                    <th>address</th>
                    <th>type</th>
                    <th>facility</th>
                    <th>feedback</th>
                    <th>profile</th>
                    <th>action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($scl as $row)

                <tr>
                    <td>{{$row->school}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->type}}</td>
                    <td>{{$row->facility}}</td>
                    <td>{{$row->feedback}}</td>

                    <td>
                        <img src="{{ URL::to('/') }}/scl_profile/{{ $row->profile }}" alt="profile" style="width:150px; height:150px;">
                    </td>

                    <td>
                        <form action="{{ route('scl.destroy',$row->id) }}" method="post">
                        <a class="btn btn-primary" href="{{ route('scl.edit',$row->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>