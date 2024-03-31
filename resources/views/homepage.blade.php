@extends('layouts.default')

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
                <td>Name</td>
                <td>Email</td>
                <td>Avatar</td>

                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->title->tit_name }}</td>

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>ไม่มีรูป</td>
                    {{-- <td>{{ $item->avatar }}</td> --}}
                    {{-- @if ($users->item$item->avatar!= null)
                        <img src="{{ asset('uploads/' . $user->avatar) }}" width="70px" height="70px" alt="image">
                    @else
                        ไม่มีรูป
                    @endif --}}

                    </td>
                    <td>
                        <a href="{{ url('/edit-user/{id}') }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          event.preventDefault();
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
            form.submit();
        }
      });
    });
    </script>
