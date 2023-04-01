<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">

        <h1>Edit Employee</h1>
        <hr>
        <!-- back button -->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employee.index') }}">back</a>
        </div>

        <form action="{{ route('employee.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Employee Name" value="{{ $employee->name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post:</strong>
                        <select class="form-control" aria-label="post" name="post" >
                            <option selected>Select Your Post</option>
                            <option value="HR" @if ($employee->post =='HR') selected @endif>HR</option>
                            <option value="Manager" @if ($employee->post =='Manager') selected @endif>Manager</option>
                            <option value="Worker" @if ($employee->post =='Worker') selected @endif>Worker</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group" id="multipleRow">
                        <strong>Salary:</strong>
                        <div class="row mb-2">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="number" name="salary" class="form-control" placeholder="Employee Contact No" value="{{ $employee->salary }}">
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
</html>