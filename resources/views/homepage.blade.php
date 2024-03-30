{{-- /*
final exam
id : 65160243
name : intuon nimthong
section : 2
*/ --}}
@extends('layouts.default')
@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    {{-- script สำหรับเรียกใช้modal sweetaleart --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
    <div class="float-right pb-4">
        <a href="/homepage/create" class="btn btn-success"> Add User </a>
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
            <?php foreach ($titles as $index => $value) { ?>
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$value -> title}}</td>
                <td>{{$value -> name}}</td>
                <td>{{$value -> email}}</td>
                <?php if($value -> avatar == null){ ?>
                    <td>ไม่มีรูป</td>
                <?php }else{ ?>
                    <td>
                    <img src="{{asset('storage'. $value-> avatar)}}" alt="" width="50%">
                    </td>
                <?php } ?>
                <td>
                    <a href="/homepage/{{$value -> id}}/edit" class="btn btn-warning">Edit</a>
                    {{-- //เมื่อกด button edit จะเรียกใช้ function edit --}}
                    <a href = "/homepage/{{$value -> id}}"  class = "delete btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <form action="" method="POST" id="formDelete">
        @csrf
        @method("DELETE")
    </form>
    <script>
        // script เรียก modal เมื่อปุ่มลบถูกคลิก
            $('.delete').click(function(e){
            // หยุดข้ามpathไว้ก่อน
            e.preventDefault();
            // เก็บpath ของ a
            var path = $(this).attr('href');
            // เอา path ไปใส่ในaction ของ form รอส่ง
            $('#formDelete').attr('action', path);
            // sweatalert
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    // เมื่อกดยืนยัน modal จะทำการส่งฟอร์มอัตโนมัติ
                    document.forms["formDelete"].submit();
                }
            })
        });
    </script>
@endsection
