@extends('layouts.default')


@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->

    <div class="float-right pb-4">
        <a href="{{ url("/add-page/") }}" class="btn btn-warning"> Add User </a>
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

        @if ($user_lists !== null)
            @foreach($user_lists as $index => $user_list)
        <tbody>
            <tr>
                <td>{{ $user_list->id }}</td>
                <td>{{ $user_list->title->tit_name }}</td>
                <td>{{ $user_list->name }}</td>
                <td>{{ $user_list->email }}</td>
                <td>
                    <img src="{{ $user_list->avatar }}"style="width:80px;heigh:80px; ">
                    @if($user_list->avatar == null)
                        ไม่มีรูป
                    @endif
                </td>

                <td>
                    <a href="{{ url("/edit-page/$user_list->id") }}" class="btn btn-warning">Edit</a>
                    {{--  <a href="{{ url("/delete/$user_list->id") }}" class="btn btn-danger">Delete</a>  --}}
                    <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ $user_list->id }}')">Delete</a>
                </td>


            </tr>
            @endforeach
        @else
        <p>ผิดพลาด</p>
        @endif

        </tbody>

    </table>


    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Function to confirm delete using SweetAlert
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to delete URL
                    window.location.href = "{{ url('/delete') }}/" + userId;
                }
            });
        }
    </script>

@endsection
