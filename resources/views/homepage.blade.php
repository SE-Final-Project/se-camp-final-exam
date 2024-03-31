@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href = "/user/create" class= "btn btn-success"> Add User </a>
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
            <?php foreach($users as $index => $user) { ?>
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$user -> u_title}}</td>
                    <td>{{$user -> u_name}}</td>
                    <td>{{$user -> u_email}}</td>
                    <td><img src="{{$user->u_avatar}}" alt="User Avatar" width="100px"></td>
                    <td>
                        <a href="/user/{{$user -> u_id}}/edit" class="btn btn-warning">Edit</a>
                        <form class = "delete-form"  style="display:inline"  action="customers/{{$user -> u_id}}" method = "POST">
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


