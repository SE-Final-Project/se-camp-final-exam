@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
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
            <?php foreach($users as $index =>$user ) {?>
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user -> title_id}}</td>
                <td>{{ $user -> name}}</td>
                <td>{{ $user -> email}}</td>
                <td>{{ $user -> avatar}}</td>
                < <td>
                    <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <?php } ?>
            {{-- @foreach($users as $User )
                    <tr>
                        <td>{{ $User->id }}</td>
                        <td>{{ $User->name }}</td>
                        <td>{{ $User->email }}</td>
                        <td>{{ $User->password }}</td>
                        <td>
                            <form action="{{ route('homepage', $User->id) }}" method="POST">
                                <a href="{{ route('edit-user', $User ->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
            {{-- <tr>
                <td>1</td>
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td>Title</td>
                <td>
                    <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr> --}}
        {{-- {!! $users->links('pagination::bootstrap-5') !!} --}}

        </tbody>
    </table>
@endsection
