@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ route('user.create') }}" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!--change label-->
                <!--65160232 พิชญุตม์ จงรักดี-->
                <td width="35px">#</td>
                <td>title</td>
                <td>name</td>
                <td>email</td>
                <td>avartar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$count++}}</td>
                <td>{{$user->title->tit_name}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td></td>
                <td>
                    <a href="{{ route('user.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" id="type-warning" type="submit" onclick="confirmDelete({{$users->id}})">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
