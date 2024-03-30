@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
<script>
    //ฟังก์ชันการลบ User 65160097
    function deleteUser(id) {
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
                    $.ajax({
                            method: "POST",
                            url: "/users/" + id,
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE"
                            }
                        })
                        .done(function() {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        });
                        location.reload();
                }
            });
        }
</script>
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
        <tbody id>
            {{-- ตารางแสดงข้อมูล User 65160097 --}}
            <?php foreach ($users as $index => $user) {?>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->title->tit_name }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <?php if(isset($user->avatar)){?>
                        <img src="{{ url('storage/'.str_replace('public/','',$user->avatar)) }}" width="50" height="50">
                        <?php }else {?> ไม่มีรูป <?php }?>
                    </td>
                    <td>
                        <a href="{{ url('/edit-user/'.$user->id) }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" onclick="deleteUser({{ $user->id }})">Delete</button>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
@endsection

