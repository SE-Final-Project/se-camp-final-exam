@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
                {{--  Delete บ่ได้ค้าบ
                      Delete บ่ได้ค้าบ
                      Delete บ่ได้ค้าบ
                      Delete บ่ได้ค้าบ
                      Delete บ่ได้ค้าบ
                      Delete บ่ได้ค้าบ 
                      ทำไม่ทันค้าบบบบบบบบบ--}}
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td width="35px">#</td>
                <td>Title</td>
                <td>Name</td>
                <td>Email</td>
                <td>Avatar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->title?->tit_name ?? 'N/A' }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if ($user->avatar)
                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}"  width="80">
                    @else
                        <span>ไม่มีรูป</span>
                    @endif
                    </td>
                    <td>
                        <a href="{{ route('edit.user', $user->id) }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection