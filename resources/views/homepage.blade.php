@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
       <head>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        </head>
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
            <tr>

                @foreach($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" width= '50' height='50' class="img img-responsive" />
                    </td>
                    <td>
                        <a href="{{ url('/edit-user',$item->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('/delete-user',$item->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>    

                        
                    </td>
                </tr>
            @endforeach
                
            </tr> 
        </tbody>
    </table>
    <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
                title: "Are you sure?",
                text: "You won't be able to revert this! ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                showconfirmButton:true,
                buttons: true


          })
          .then((willCancel) => {
              if (willCancel) {

                  window.location.href = urlToRedirect;
              }  
  
  
          });
  
          
      }
  </script>

  
<div>

@endsection
