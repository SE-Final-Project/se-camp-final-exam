@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="/users/create" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td width="35px">#</td>
                <td width="80px">Title</td>
                <td>name</td>
                <td>email</td>
                <td width="185px">Tools</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($customers as $index  => $customer) { ?>
            <tr>
                <td>{{ $index + 1}}</td>
                <td>{{ $customer -> c_title}}</td>
                <td>{{ $customer -> c_name}}</td>
                <td>{{ $customer -> c_email}}</td>
                <td>
                    {{--edit--}}
                    <a href="/users/{{$customer -> c_id}}/edit" class="btn btn-warning">Edit</a>
                    {{--Delete--}}
                    
                    <form action="/users/{{$customer -> c_id}}" method="POST" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" style="padding: 0px 12px;"><i class="btn btn-danger">Delete</i></button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
@endsection
