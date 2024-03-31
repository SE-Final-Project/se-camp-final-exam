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
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td>Title</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($User as $index)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @foreach ($Title as $titleIndex => $title_name)
                        @if ($index->title_id == $title_name->id)
                            <td>{{ $title_name->tit_name }}</td>
                        @endif
                    @endforeach
                    <td>{{ $index->name }}</td>
                    <td>{{ $index->email }}</td>
                    <td>avatar</td>
                    <td>
                        <a href="{{ url('/edit-user') }}/{{$index->id}}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger" onclick="destroyUser({{ $index->id }})">Delete</button>
                        {{-- <a href="{{ url('/destroy-user') }}/{{ $index->id }}" class="btn btn-danger">Delete</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function destroyUser(id) {
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
                    window.location = "{{ url('/destroy-user') }}/" + id

                }
            })
        }
    </script>
@endsection
