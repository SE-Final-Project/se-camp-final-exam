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
            {{-- ลูปเพื่อแสดงข้อมูลuser --}}
            @foreach ($Users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        {{-- ลูปหาtitleที่ตรงกับtitle_idที่เก็บในuser --}}
                        @foreach ($Titles as $Tindex => $title)
                            @if ($user->title_id == $title->id)
                                {{ $title->tit_name }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- add file picture --}}
                        @if ($user->avatar!= null)
                            <div class="text-center">
                                <img src="..\assets\img\{{ $user->avatar }}" alt="" class="rounded mx-auto d-block img-size-50">
                            </div>
                        @else
                            <p class="text-center">ไม่มีรูป</p>
                        @endif
                    </td>

                    <td>
                        <a href="{{ url('/edit-user') }}/{{ $user->id }}" class="btn btn-warning" >Edit</a> {{-- แนบidของuserที่ต้องการแก้ไข --}}
                        <button class="btn btn-danger" onclick="deleteME({{ $user->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        //ใช้sweetalertแสดงยืนยันการลบ
        const deleteME = async (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const response = await fetch(`/delete/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },

                    });
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    window.location.reload()
                }
            });
        }
    </script>
@endsection
