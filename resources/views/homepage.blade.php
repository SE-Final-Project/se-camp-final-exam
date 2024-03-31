@extends('layouts.default')

<?php use App\Models\Title; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="35px">#</th>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <th width="150px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <?php $title = Title::where('id', $user->title_id)->first(); ?>
                    @if($title)
                        <td>{{ $title->tit_name }}</td>
                    @else
                        <td>{{ "ไม่ได้กำหนด" }}</td>
                    @endif
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ asset($user->avatar) }}" width='50' height='50' class="img img-responsive" alt="">
                        @else
                            No Avatar
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/edit-user/'.$user->id) }}" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ url('/delete-user/'.$user->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="on()">Delete</button>
                        </form>
                        <script>
                            function deleteItem() {
                                console.log("Item deleted!"); 
                            }
                        </script>
                        <script>
                                function on() {
                                    // แสดงกล่องข้อความสำหรับการยืนยันการลบ
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // ถ้าผู้ใช้กดปุ่ม Yes
                                            Swal.fire(
                                                'Deleted!',
                                                'Your profile has been deleted.',
                                                'success'
                                            );
                                            // ใส่โค้ดที่คุณต้องการให้ทำงานเมื่อลบข้อมูลทำเสร็จ
                                            // เช่น เรียกฟังก์ชันสำหรับการลบข้อมูลที่เกี่ยวข้อง
                                        }
                                    });
                                }
                            </script>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection