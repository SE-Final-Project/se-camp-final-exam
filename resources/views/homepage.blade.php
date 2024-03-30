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
        <tbody id="my_tbody">
        </tbody>
    </table>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function getData() {
        var value_my_tbody = `<tr>
                           <td colspan="5" style="text-align: center;">
                           </td>
                       </tr>`;
        $('#my_tbody').html(value_my_tbody);

        setTimeout(() => {
            $.ajax({
                    method: "GET",
                    url: "user"
                })
                .done(function(userData) {
                    console.log("User data:", userData);
                    // Fetch title data for each user
                    userData.forEach((user, index) => {
                        $.ajax({
                                method: "GET",
                                url: "title"
                            })
                            .done(function(titleData) {
                                console.log("Title data:", titleData);
                                console.log(user.avatar)
                                var title = titleData[index % titleData.length];
                                var value_my_tbody = `<tr>
                                            <td>${index + 1}.</td>
                                            <td>${user.name}</td>
                                            <td>${user.email}</td>
                                            <td>
                                            <img src="{{ url('/storage')}}/${user.avatar.replace('public/', '')}" style="width: 50px; height: 50px">
                                            </td>
                                            <td>${title.tit_name}</td>
                                            <td>
                                                <a href="{{ url('/edit-page/') }}/${user.id}">
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </a>
                                                <button type="button" class="btn btn-danger" onclick="deleteme(${user.id})">Delete</button>
                                            </td>
                                        </tr>`;
                                $('#my_tbody').append(value_my_tbody);
                            })
                            .fail(function(jqXHR, textStatus, errorThrown) {
                                console.error("AJAX request failed:", errorThrown);
                            });
                    });
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed:", errorThrown);
                });

        }, 1000);
    }

    getData();

    function deleteme(id) {
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
                $.ajax({
                        method: "POST",
                        url: "delete/" + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        }
                    })
                    .done(function(msg) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        getData();
                    });
            }
        });
    }
</script>
