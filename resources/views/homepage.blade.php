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
                        //{{ "ไม่ได้กำหนด" }}
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
                        <!-- Add delete functionality -->
                        <form method="post" action="{{ url('/delete-user/'.$user->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="delete()">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                <script>
                    function delete(){
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: "btn btn-success",
                                cancelButton: "btn btn-danger"
                            },
                            buttonsStyling: false
                            });
                            swalWithBootstrapButtons.fire({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Yes, delete it!",
                                cancelButtonText: "No, cancel!",
                                reverseButtons: true
                            }).then((result) => {
                            if (result.isConfirmed) {
                                    swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            } else if (
                                /* Read more about handling dismissals below */
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire({
                                    title: "Cancelled",
                                    text: "Your imaginary file is safe :)",
                                    icon: "error"
                                });
                            }
                            });
                    }
                </script>

        </tbody>
    </table>
@endsection
