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
                <td width="35px">#</td>
                <td>Title</td>
                <td>name</td>
                <td>email</td>
                <td>avata</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $item->title->tit_name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>

                        @if ($item->avatar != null)
                            <img src="{{ asset('onload/user/' . $item->avatar) }}" alt=""
                                style="height: 80px; width: 100px;">
                        @else
                            <p>ไม่มีรูปภาพ</p>
                        @endif

                    </td>
                    <td>
                    <a href="{{ route('user.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" id="type-warning" type="submit" onclick="confirmDelete({{$item->id}})">Delete</button>

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        // Function to confirm delete using SweetAlert
        function confirmDelete(userId) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณต้องการลบผู้ใช้นี้หรือไม่?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to delete URL
                    window.location.href = "{{ url('user/delete') }}/" + userId;
                }
            });
        }
    </script>
@endsection