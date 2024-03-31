<!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ -->

@extends('layouts.default')

@section('page_name', 'Users Data')
@section('js')
    <script>
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
                            url: "/users/" + id,
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE"
                            }
                        })
                        .done(function() {
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

        function getData() {
            value_my_tbody = ``
            setTimeout(() => {
                $.ajax({
                        method: "GET",
                        url: "api/users/"
                    })
                    .done(function(data) {
                        console.log("data", data)

                        $('#my_tbody').html(value_my_tbody)
                    })
            }, 2000);
        }
        getData();
    </script>
@endsection

@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ เป็นส่วนสร้างตาราง-->
                <td width="35px">#</td>
                <td>Title</td>
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td width="155px">Tools</td>
            </tr>
        </thead>
        <tbody>
            <!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ เป็นส่วนดึงข้อมูลจาก Database แสดงลงในตารางหน้า homepage -->
            <?php
                $c = mysqli_connect('localhost', 'root', '', 'final_exam_camp_db');
                mysqli_query($c, 'SET NAMES UTF8');
                $sqlUser = ' SELECT * FROM users ';
                $sqlTitle = ' SELECT * FROM titles ';
                $qUser = mysqli_query($c, $sqlUser);
                $ind = 0;
                while ($fUser = mysqli_fetch_assoc($qUser)) {
                    echo "<tr><td>".($ind+1)."</td>";
                    $qTitle = mysqli_query($c, $sqlTitle);
                    while ($fTitle = mysqli_fetch_assoc($qTitle)) {
                        if($fUser['title_id']==$fTitle['id']){
                            echo "<td>{$fTitle['tit_name']}</td>";
                        }
                    }
                    echo "<td>{$fUser['name']}</td>";
                    echo "<td>{$fUser['email']}</td>";
                    if ($fUser['avatar'] == ''|| $fUser['avatar'] == 'ไม่มีรูป') {
                         echo "<td>ไม่มีรูป</td>";
                    } else {
                         //echo "<td>{$fUser['avatar']}</td>";
                        //  echo "<td><img src='". url('/storage') ."/".$fUser['avatar'].replace('public/','')."'></td>";
                         echo "<td><img src='".url('assets/img/'.$fUser['avatar'])."' width= '50' height='50' class='img img-responsive'></td>";
                    }
                    echo "<td><a href='/edit-user' class='btn btn-warning'>Edit</a>&nbsp;&nbsp;<button class='btn btn-danger'>Delete</button></td></tr>";
                    $ind++;
                }mysqli_close($c);
            ?>
        </tbody>
    </table>
@endsection

