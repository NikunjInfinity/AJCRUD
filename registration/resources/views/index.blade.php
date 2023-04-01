<!doctype html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Datatable CDN CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>REGISTRATION</title>
</head>

<body>
<!-- table for view -->
    <table class="table table-dark table-striped reg-table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Education</th>
                <th>Hobbie</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>

    <!-- Button trigger modal -->
    <a class="btn btn-primary" href="javascript:void(0)" id="create">Add</a>

    <!-- Modal -->
    <div class="modal fade" id="RegModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                </div>
                <div class="modal-body">
                    <!-- FORM -->
                    <form action="" id="regform" name="regform" class="form-horizontal">
                        
                        <!-- hidden -->
                        <input type="hidden" name="data_id" id="data_id" value="{{ csrf_token() }}">

                        <!-- Name -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name</span>
                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="name" id="name">
                        </div>

                        <!-- Email -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">E-Mail</span>
                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="email" id="email">
                        </div>

                        <!-- Mobile -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Mobile No.</span>
                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="mobile" id="mobile">
                        </div>

                        <!-- gender -->
                        <h6>Gender :</h6>
                        <div class="form-check">
                            <input type="radio" class="form-check-input gender" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input gender" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>

                        <!-- education -->
                        <h6>Education :</h6>
                        <select class="form-select" aria-label="Default select example" name="education" id="education">
                            <option value="SSC">SSC</option>
                            <option value="HSC">HSC</option>
                            <option value="GRADUATE">GRADUATE</option>
                        </select>

                        <!-- hobbie -->
                        <h6>Hobbies :</h6>
                        <div class="form-check">
                            <input class="form-check-input get_value" type="checkbox" value="cricket" id="Cricket" name="hobbie[]">
                            <label class="form-check-label" for="Cricket">
                                Cricket
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input get_value " type="checkbox" value="hockey" id="Hockey" name="hobbie[]">
                            <label class="form-check-label" for="Hockey">
                                Hockey
                            </label>
                        </div>

                        <!-- save btn -->
                        <button type="submit" class="btn btn-success" id="saveBtn" value="Create">Save</button>

                        <!-- UPDATE BTN-->
                        <button type="button" class="btn btn-success" id="updateBtn" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JQ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JS CDN (DATATABLE) -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <meta name="_token" content="{!! csrf_token() !!}" />

</body>
<!-- CODE OF AJAX AND JQ -->
<script type="text/javascript">

// VIEW
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $(".reg-table").DataTable({
            serverSide: true,
            processing: true,
            ajax: "{{ route('rgstr.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {

                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'education',
                    name: 'education'
                },
                {
                    data: 'hobbie',
                    name: 'hobbie'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });

// OPEN/CLOSE MODAL
        $("#create").click(function() 
        {
            $('#saveBtn').val('Create');
            $('#saveBtn').show();
            $('#updateBtn').hide();
            $('#data_id').val('');
            $("#regform").trigger("reset");
            $("#modalTitle").html("Add New");
            $("#RegModal").modal('show');
        });

// SUBMIT DATA
        $('#saveBtn').on('click', function(event) {
            var name = $("#name").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var gender = $('input[type="radio"]:checked').val();
            var education = $("#education").val();
            var hobbie = [];
            $('.get_value').each(function() {
                if ($(this).is(":checked")) {
                    hobbie.push($(this).val());
                }
            });
            hobbie = hobbie.toString();

            event.preventDefault();
            $.ajax({
                url: "{{ route('rgstr.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    mobile: mobile,
                    gender: gender,
                    education: education,
                    hobbie: hobbie
                },
                dataType: "json",
                success: function(data) {
                    location.reload();

                },
                error: function(data) {
                    alert("Error")
                }
            });
        });

//   DELETE
        $('body').on('click', '.deleteData', function() 
        {
            var data_id = $(this).data("id");
            // CONFIRM MSG
            confirm("Are You sure want to delete ?");
            $.ajax
            ({
                url: "{{ route('rgstr.store') }}" + '/' + data_id,
                data: {
                    "_token": "{{csrf_token()}}",

                    name: $('#name').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    gender: $('.gender').val(),
                    education: $('#education').val(),
                    hobbie: $('.get_value').val(),
                },
                type: "DELETE",
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

// EDIT
        $('body').on('click', '.editData', function() 
        {
            var data_id = $(this).data('id');
            $('#saveBtn').hide();
            $('#updateBtn').show();

            $.get("{{ route('rgstr.index') }}" + '/' + data_id + '/edit',
                function(data) 
                {
                    $('#modalTitle').html("Edit Data");
                    $('#saveBtn').val("edit-data");
                    $('#RegModal').modal('show');
                    $('#data_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#mobile').val(data.mobile);

                    //EDIT FOR RADIO   
                    if (data.gender == 'male') 
                    {
                        $("input[name=gender][value='male']").prop('checked', true);
                    } else {
                        $("input[name=gender][value='female']").prop('checked', true);
                    }

                    $('#email').val(data.email);
                    $('#education').val(data.education);

                    // EDIT FOR CHECKBOX
                    $('.get_value').prop('checked', false);
                    var arr = data.hobbie.split(',');
                    console.log(arr);
                    const isInArray = arr.includes('cricket');
                    if (isInArray) 
                    {
                        $("#Cricket").prop('checked', true);
                    }
                    const isInArray1 = arr.includes('hockey');
                    if (isInArray1) {
                        $("#Hockey").prop('checked', true);
                    }
                });
        });

// UPDATE
        $("#updateBtn").click(function(e)
            {
                var id = $("#data_id").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var mobile = $("#mobile").val();
                var gender = $('input[type="radio"]:checked').val();
                var education = $("#education").val();
                var hobbie = [];
                $('.get_value').each(function() 
                {
                    if ($(this).is(":checked")) 
                    {
                        hobbie.push($(this).val());
                    }
                });
                hobbie = hobbie.toString();
                event.preventDefault();

                $.ajax
                ({
                    url: "{{ route('rgstr.store') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                        name: name,
                        email: email,
                        mobile: mobile,
                        gender: gender,
                        education: education,
                        hobbie: hobbie
                    },
                    dataType: "json",
                    success: function(data) 
                    {
                        location.reload();
                    },
                    error: function(data) 
                    {
                        alert("Error")
                    }
                });
            });

    });
</script>

</html>