<!--
#view-name : addpage.blade.php
#view-description : display add page
#input : loop to show all data.
#output : all data to show on homepage.
#author : Thidarat Onsanit 65160337
#create-date : 2024-03-31
#update : 1 #edited-date : 2024-03-31 #edited-by : Thidarat Onsanit 65160337
#edit-description : show all data and make delete button can be click able.
-->

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
            {{-- loop for store data to show on display. Thidarat Onsanit 65160337 --}}
            @foreach ($data_user as $data)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$data->tit_name}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>
                    {{-- check if user not have avatar. Thidarat Onsanit 65160337 --}}
                    @if (File::exists($data->avatar))
                    <img src="{{asset($data->avatar)}}" alt="Avatar of {{$data->name}}" style="width: 150px;">
                    @else
                    ไม่มีรูปภาพ
                    @endif
                </td>
                <td style="display: flex; justify-content: space-between; border:0">
                    {{-- add action to Edit Button. Thidarat Onsanit 65160337 --}}
                    <form method="post" action="/edit-user/{{$data->id}}">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-warning">Edit</button>
                    </form>
                     {{-- add action and Method to Delete Button. Thidarat Onsanit 65160337 --}}
                    <form method="post" action="/{{$data->id}}">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-danger show_confirm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
 {{-- add @section('js') to make sweet alert. Thidarat Onsanit 65160337 --}}
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    {{-- sweet alert display. Thidarat Onsanit 65160337 --}}
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
        // if comfirm to delete data. Thidarat Onsanit 65160337
        if (result.isConfirmed) {
            form.submit();
        }
      });
    });
    </script>

@endsection
