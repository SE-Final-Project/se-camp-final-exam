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
                <td>avatar</td>

                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
             @foreach ($users as $user)
            <tr>
                <td>{{$number++}}</td>
                <td>{{$user->title->tit_name}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->avatar!=null)
                        <img src="{{asset('uploads/user/'.$user->avatar)}}" alt="" style="height: 80px; width: 100px;">
                    @else
                        <p>ไม่มีรูปภาพ</p>
                    @endif
                </td>
                <td>

                     <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" id="type-warning" type="submit" onclick="confirmDelete({{$user->id}})">Delete</button>



                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Confirm?',
                text: "Are you sure want to delete this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4169E1',
                cancelButtonColor: '#DC143C',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "{{ url('user/delete') }}/" + userId;
                }
            });
        }
    </script>
@endsection
