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
            @foreach ($user_list as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    @if ($item->title_id == 1)
                        <td>นาย</td>
                    @elseif ($item->title_id == 2)
                        <td>นางสาว</td>
                    @elseif ($item->title_id == 3)
                        <td>นาง</td>
                    @elseif ($item->title_id == 4)
                        <td>คุณ</td>
                    @endif

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    @if ($item->avatar !== null)
                        <td style="width: 10% ; height: 10%"><img src="{{ asset($item->avatar) }}" alt=""
                            style="max-width: 100%; max-height: 100%;"></td>
                    @else
                        <td>ไม่มีรูป</td>
                    @endif
                    
                    {{-- <td><img src="{{ $item->avatar }}"></td> --}}
                    <td>
                        <div class="d-flex">
                            <a href="{{ url('/edit-user/' . $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="/delete/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>

                        </div>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
