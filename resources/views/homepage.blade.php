@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
{{-- ชินธร สมบัติกำจรกุล 65160105 --}}
    <!-- CODE HERE -->
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
                <td>Avartar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>คุณ</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    {{-- ลูปเก็บค่าตัวแปรต่างๆลงไปใน item --}}
                    <td>
                        @if ($item->avatar != null)
                            <img src = "{{ asset('uploads/' . $item->avatar) }}" width="90px" height="90px" alt="image">
                            {{-- เงื่อนไขว่าถ้าไม่มีข้อมูลรูปในตัวแปร item ให้แสดงว่า ไม่มีรูปภาพ แต่ถ้ามีให้ทำการแสดงใน floder uploads  --}}
                        @else
                            ไม่มีรูปภาพ
                        @endif
                    </td>
                    <td style="display: flex; justify-content:center">
                        <a href="{{ url('edit-user/' . $item->id) }}" class="btn btn-warning"
                            style="margin-right:10px">Edit</a>
                            {{-- ถ้ากดปุ่ม edit ให้แสดงไปที่หน้า edit-user ที่ตรงกับ id นั้นๆ --}}
                        <button style="margin-left: 10px" class="btn btn-danger delete-btn"
                            data-id="{{ $item->id }}">Delete</button>
                            {{-- ปุ่ม delete เมื่อกดก็จะลบข้อมูลที่ตรงกับ id ช่องนั้นๆ --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@section('js')
{{-- เป็นการทำงาน โชว์ popup ว่าเราได้ทำการลบข้อมูลแล้ว --}}
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                // สร้างตัวแปร userid มาเก็บค่า id ของ user นั้นๆ
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'delete-user/' + userId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    // ถ้า ฟังก์ชัน destroy success เป็น true ก็จะทำการลบ
                                    // ลบแถวที่ตรงกับ id ออก
                                    $('#user_' + userId).remove();

                                    // แสดง SweetAlert แจ้งการลบข้อมูลสำเร็จ
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(() => {
                                        // Reload the page after the SweetAlert is closed
                                        location.reload();
                                    });
                                } else {
                                    // Handle error response if needed
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

@endsection
