@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href={{ url('/insert') }} class="btn btn-success"> Add User </a>
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
            <?php $id = null; ?>
            @foreach ($users as $data)
                <tr>
                    <td>
                        {{ $data['id'] }}
                    </td>
                    <td>
                        @foreach ($titles as $title_data)
                            @if ($data['title_id'] == $title_data['id'])
                                {{ $title_data['tit_name'] }}
                            @endif
                        @endforeach

                    </td>
                    <td>
                        {{ $data['name'] }}
                    </td>
                    <td>
                        {{ $data['email'] }}
                    </td>
                    <td>
                        @if ($data['avatar'] == null)
                            ไม่มีรูป
                        @else
                            <img width="90rem" src="{{ url($data['avatar']) }}" alt="">
                        @endif

                    </td>

                    <td>
                        <a href={{ url('/edit-user/' . $data['id']) }} class="btn btn-warning">Edit</a>
                        <?php $id = $data['id']; ?>
                        <button class="btn btn-danger" onclick="delete_data()">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function delete_data() {
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
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ).then(function() {
                        window.location.replace('{{ url('/delete/' . $id) }}');
                    });
                }
            })
        }
    </script>
@endsection
