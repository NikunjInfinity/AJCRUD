<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container pt-5">
    <h1>ADD Employee:</h1>
    <hr>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
    </div>

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employee Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Employee Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post:</strong>
                    <select class="form-control" aria-label="Default select example" name="post">
                        <option selected>Select Your Post</option>
                        <option value="HR">HR</option>
                        <option value="Manager">Manager</option>
                        <option value="Worker">Worker</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="multipleRow">
                    <strong>Salary:</strong>
                    <div class="row mb-2">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="number" name="salary" class="form-control" placeholder="Employee Contact No">
                        </div>
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".add").click(function() {
            $('#multipleRow').append('<div class="row mb-2"><div class="col-xs-11 col-sm-11 col-md-11"><input type="number" name="contactno[]" class="form-control" placeholder="Employee Contact No"></div><div class="col-xs-1 col-sm-1 col-md-1"><button class="btn btn-danger remove" type="button" id="removerow">Remove</button></div></div>');
        });
        $('body').on('click', '#removerow', function() {
            $(this).parent().parent().remove();
        });
    });
</script>

</html>