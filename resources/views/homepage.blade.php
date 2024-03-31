@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="/customers/create" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td width="35px">#</td>
                <td>Title</td>
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($customers as $index => $customers) {?>
             <tr>
                <td>{{$index + 1 }}</td>
                <td>{{$customers -> c_title }}</td>
                <td>{{$customers -> c_name }}</td>
                <td>{{$customers -> c_email }}</td>
                <td>{{$customers -> c_avatar }}</td>
                <td>
                    <a href="customers/{{$customers -> c_id}}/edit" class="btn btn-warning">Edit</a>
                    
                    <form class = "delete-form"  style="display:inline"  action="customers/{{$customers -> c_id}}" method = "POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table>
@endsection
