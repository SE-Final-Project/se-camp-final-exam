<!--65160100 Apiwat Chookhai -->
@extends('layouts.default') <!--  กำหนด layout หลักที่จะใช้ -->

@section('page_name', 'Users Data') <!-- กำหนดชื่อหน้าเพจ -->

@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a> <!-- ปุ่มเพิ่มผู้ใช้ใหม่ -->
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td width="35px">#</td>
                <td>title</td>
                <td>ชื่อ</td>
                <td>อีเมล</td>
                <td>รูปโปรไฟล์</td>
                <td width="150px">เครื่องมือ</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->titles }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>

                    @if($user->avatar)
                    <!-- มันมีข้อมูลภาพ แต่มันไม่แสดงภาพ -->
                        <img src="{{ $user->avatar }}" class="img-thumbnail" alt="Avatar">
                        <p>{{ basename($user->avatar) }}</p>
                    @else
                    <!-- แสดงข้อความตามปกติ -->
                        ไม่มีรูป
                    @endif
                </td>
                <td>
                    <a href="{{ url('/edit-user/'.$user->id) }}" class="btn btn-warning">Edit</a> <!-- ปุ่มแก้ไขข้อมูลผู้ใช้ -->
                    <form id="delete-form-{{ $user->id }}" action="{{ route('delete-user', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="deleteUser('{{ $user->id }}')">Delete</button> <!-- ปุ่มลบข้อมูลผู้ใช้ -->
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- เพิ่มไฟล์ JavaScript ของ SweetAlert -->

<script>
    function deleteUser(userId) {
        swal({
            title: "Are you sure?", // ข้อความยืนยันการลบ
            text: "Once deleted, you will not be able to recover this user!", // ข้อความเตือนความสำคัญ -->
            icon: "warning", // ไอคอนเตือน
            buttons: ["Cancel", "Delete"], // ปุ่มยกเลิก และ ปุ่มลบ
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-form-' + userId).submit(); // ถ้ายืนยันการลบ จะส่งคำร้องขอลบผู้ใช้
            } else {
                swal("User deletion cancelled!", { // ถ้ายกเลิกการลบ
                    icon: "info",
                });
            }
        });
    }
</script>
