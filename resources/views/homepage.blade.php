@extends('layouts.default')
@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{route('add')}}" class="btn btn-success"> Add User </a>
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

            @foreach ($user as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>คุณ</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>ไม่มีรูป</td>
                    <td>
                        <a href="edit" class="btn btn-warning">Edit</a>
                        <a href="delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            {{-- <tr>
                <td>1</td>
                <td>คุณ</td>
                <td>latthisit</td>
                <td>65160352@gmail.com</td>
                <td>ไม่มีรูป</td>
                <td>
                    <a href="edit" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr> --}}

        </tbody>
    </table>
@endsection
