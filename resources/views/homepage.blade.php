@extends('layouts.default')
<?php use App\Models\Title; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('page_name', 'Users Data')
@section('content')
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
          @foreach($users as $id => $user)
                <tr>
                    <td>{{ $id+1 }}</td>

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
                        <a href="{{ url('/edit-user/'.$user->id)}}" class="btn btn-warning">Edit</a>
                        <!-- Add delete functionality -->
                        <form id="delete-form-{{ $user->id }}" method="post" action="{{ url('/delete-user/'.$user->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<script>
    function confirmDelete(userId) {
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
                // Submit the form
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>
