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
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($User as $index => $data)
            <tr>

                <td>{{$index + 1}}</td>
                @foreach ( $Title as $indexTitle => $dataTitle )
                    @if ($data->title_id==$dataTitle->id)
                    <td>{{$dataTitle->tit_name}}</td>
                    @endif
                @endforeach

                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->avatar}}</td>

                <td>
                    <a href="{{ url('/edit-user') }}/{{$data->id}}" class="btn btn-warning">Edit</a>

                    <button class="btn btn-danger" onclick="deleteUser({{$data->id}})">Delete</button>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteUser(id){
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
                window.location = "{{ url('/delete') }}/"+id

            }
            })
        }
     </script>
@endsection
