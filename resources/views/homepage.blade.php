@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success">Add User</a>
    </div>
    <table class="table table-bordered">
        {{-- 65160216 ญาณากร --}}
        {{-- ส่วนหัวตาราง --}}
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
        {{-- แสดงข้อมูลผู้ใช้ในฐานข้อมูล --}}
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- ไม่มีข้อมูลคือ Not Available --}}
                    <td>{{ $user->title?->tit_name ?? 'Not Available' }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- ถ้ามีภาพ จะแสดงขนาดภาพที่สโตร์ไว้ที่ 120 --}}
                    @if ($user->avatar)
                        <img src="{{ asset('storage/avatars/'.$user->avatar) }}" width="120">
                    @else
                    {{-- ถ้าไม่จะขึ้นว่า --}}
                        <span>ไม่มีรูป</span>
                    @endif
                    </td>
                    <td>
                        {{-- เขียน alert ไม่เป็นครับ --}}
                        <a href="{{ route('edit.user', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete.user', $user->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
