@extends('layouts.default')

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
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>HI</td>
                    {{-- <td>{{$user->title_id->tit_name}}</td> --}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->avatar != null)
                            <img src="{{ asset('uploads/' . $user->avatar) }}" width="70px" height="70px" alt="image">
                        @else
                            ไม่มีรูปภาพ
                        @endif
                    </td>
                    <td style="display:flex">
                        <a href="{{ url('/edit-user/').'/'. $user->id}}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ url('delete-user/' . $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="myFunction2()" class="btn btn-danger" type="submit">Delete</button>
                            <script>
                                function myFunction2() {
                                    alert("Delete Successfully!!!");
                                }
                            </script>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
