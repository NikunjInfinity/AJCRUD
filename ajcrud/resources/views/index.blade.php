<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- DATA TABLE CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>AJAX CRUD</title>
</head>

<body>
    <div class="container">
        <!-- Add Data -->
        <a class="btn btn-primary" href="javascript:void(0)" id="create">Add</a>
        <!-- table for view -->
        <table class="table table-dark table-striped data-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>
    <!-- modal VIEW OF FORM USING BOOTSTRAP -->
    <div class="modal fade" id="ajaxModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalHeading"></h3>
                </div>
                <div class="modal-body">
                    <!-- FORM -->
                    <form action="" id="addForm" name="addForm" class="form-horizontal">
                    <input type="hidden" name="data_id" id="data_id">
                        <div class="form-group">
                            Name:
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="">
                        </div>
                        <div class="form-group">
                            Email:
                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="">
                        </div>
                        <!-- SAVE BTN-->
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

    <!-- JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>

<!-- CODE OF AJAX AND JQ -->
<script type="text/javascript">

    // VIEW
    $(function() {
        $.ajaxSetup
        ({
            headers: 
            {   
                // PASS TOKEN
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // verify that a user is authorized to perform an action on a website.
            }
        });
                    // CLASS OF TABLE
        var table = $(".data-table").DataTable
        ({
           //Simply set it to true and DataTables will operate in server-side processing mode
            serverSide: true, 
            processing: true,

            ajax: "{{ route('data.index') }}",

            columns: 
                [{
                    // The default index column name
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    // FIELDS
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    //FOR OPERATION EDIT $ DELETE
                    data: 'action',
                    name: 'action'
                }]
        });

        // open Modal for enter data:
        $("#create").click(function() 
        {   //click on add then savebtn show and updatebtn hide
            $('#updateBtn').hide();
            $('#saveBtn').show();

            $('#saveBtn').val("create-data");
            // HIDDEN FIELD ID
            $('#data_id').val('');
            //FORM ID
            $("#addForm").trigger("reset");
            //MODEL HEADING ID
            $("#modalHeading").html("Add New");
            //MODAL OF BS ID
            $("#ajaxModal").modal('show');
        });

        // SUBMIT DATA
        $("#saveBtn").click(function(e) 
        {   
            // The preventDefault() method cancels the event if it is cancelable
            e.preventDefault();

            $(this).html('Save');

            $.ajax
            ({
                url: "{{route('data.store')}}",
                data: 
                {
                    //to verify that the authenticated user is the person actually making the requests to the application.
                    "_token": "{{csrf_token()}}",
                    name: $('#name').val(),
                    email: $('#email').val(),
                },
                type: "POST",   
                dataType: 'json',

                success: function() 
                {
                    location.reload();
                },
            });
        });

        // EDIT&UPDATE
                            //EDIT BTN ID
        $('body').on('click', '.editData', function()
        {
            var data_id = $(this).data('id');
            //click on add then savebtn hide and updatebtn show
            $('#saveBtn').hide();
            $('#updateBtn').show();

            $.get
            ("{{ route('data.index') }}" + '/' + data_id + '/edit', function(data) 
            {
                $('#modalHeading').html("Edit Data");
                $('#saveBtn').val("edit-data");
                $('#ajaxModal').modal('show');

                $('#data_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
            });
        });
         // updare records
         $("#updateBtn").click(function(e) 
        {
            e.preventDefault();
            $.ajax
            ({
                url: "{{route('data.store')}}",
                data: 
                {
                    "_token": "{{csrf_token()}}",
                    id: $('#data_id').val(),
                    name: $('#name').val(),
                    email: $('#email').val()
                },
                type: "POST",
                dataType: 'json',

                success: function() 
                {
                    location.reload();
                },
            });
        });

        // DELETE
                            // DELETE BTN ID
        $('body').on('click', '.deleteData', function() 
        {
            var data_id = $(this).data("id");
            // CONFIRM MSG
            confirm("Are You sure want to delete ?");

            $.ajax
            ({
                url: "{{ route('data.store') }}" + '/' + data_id,
                data: 
                {
                    "_token": "{{csrf_token()}}",
                    name: $('#name').val(),
                    email: $('#email').val(),
                },

                type: "DELETE",

                success: function(data) 
                {
                    table.draw();
                },

                error: function(data) 
                {
                    console.log('Error:', data);
                }
            });
        });

       
    });
</script>

</html>