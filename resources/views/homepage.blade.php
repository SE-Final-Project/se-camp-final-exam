@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
{{-- ณัฐดนัย ธาราโรจน์ชัยกุล 65160329 --}}
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
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
            {{-- วนลูปข้อมูลลงในตัวแปร user --}}
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>คุณ</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- เงื่อนไขเช็คว่ามีข้อมูลรูปภาพในตัวแปร user หรือไม่ ถ้ามีจะแสดง preview รูปภาพที่อยู่ใน folder uploads แต่ถ้าไม่มีจะแสดงคำว่า "ไม่มีรูป" --}}
                        @if ($user->avatar != null)
                            <img src="{{ asset('uploads/' . $user->avatar) }}" width="70px" height="70px" alt="image">
                        @else
                            ไม่มีรูป
                        @endif
                    </td>
                    <td style="display: flex; height: 95px">
                        {{-- กดปุ่ม edit จะไปที่หน้า edit-user ของ User ที่ตรงตาม id นั้นๆ --}}
                        <a href="{{ url('edit-user/' . $user->id) }}" class="btn btn-warning"  style="height: 38px ; margin-right :5px ; width: 70px">Edit</a>
                        {{-- กดปุ่ม delete จะลบข้อมูลของ User ที่ตรงตาม id นั้นๆ --}}
                        <button style="height: 38px ; margin-left: 10px" class="btn btn-danger delete-btn"
                            data-id="{{ $user->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            //เมื่อปุ่ม delete ถูก click
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                //แสดง SweetAlert
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //ถ้ากดยืนยันการลบจะไปที่ url delete-user/ ตามด้วย id นั้นๆ และเป็นประเภท delete
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'delete-user/' + userId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    // ถ้าค่าที่ส่งคืนจาก Method delete เป็น true จะทำการลบ
                                    // ทำการลบข้อมูลที่ตรงกับ id
                                    $('#user_' + userId).remove();

                                    // แสดง SweetAlert ลบข้อมูลสำเร็จ
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(() => {
                                        // รีโหลดหน้าเมื่อตัว SweetAlert ถูกปิด
                                        location.reload();
                                    });
                                } else {
                                    //ตัวบอก error เมื่อลบไม่สำเร็จ
                                    Swal.fire(
                                        'Error!',
                                        'Failed to delete user.',
                                        'error'
                                    );
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
