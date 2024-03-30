@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>
    

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="Myform" class="form-horizontal" action="{{ route('UserController.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="title">
                            <option value="คุณ">คุณ</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group ">               
                <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Avatar</label>

                    <div class="col-sm-10 custom-file ">
                        <input type="file" class="custom-file-input" id="image" name="image" >
                        <label class="custom-file-label" for="customFile">Choose file</label>                    
                    </div>
                </div>
            </div>

            </div>
            
            
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" value="Save" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>

        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            </script>

      

        <script>
            // Optional: Add event listener for form submission and prevent default behavior if validation fails
            document.getElementById('Myform').addEventListener('submit', function(event) {
              if (!this.checkValidity()) {
                event.preventDefault();
                alert('Please fill in all required fields!');
              }
            });
          </script>
    </div>

</body>
    <!-- /.card -->
@endsection
