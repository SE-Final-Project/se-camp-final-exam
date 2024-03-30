<!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ -->

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
                while ($fUser = mysqli_fetch_assoc($qUser)) {
                    echo "<tr><td>{$fUser['id']}</td>";
                    $qTitle = mysqli_query($c, $sqlTitle);
                    while ($fTitle = mysqli_fetch_assoc($qTitle)) {
                        if($fUser['title_id']==$fTitle['id']){
                            echo "<td>{$fTitle['tit_name']}</td>";
                        }
                    }
                    echo "<td>{$fUser['name']}</td>";
                    echo "<td>{$fUser['email']}</td>";
                    if ($fUser['avatar'] == '') {
                         echo "<td>ไม่มีรูป</td>";
                    } else {
                         echo "<td>{$fUser['avatar']}</td>";
                    }
                    echo "<td><a href='/edit-user' class='btn btn-warning'>Edit</a>&nbsp;&nbsp;<button class='btn btn-danger'>Delete</button></td></tr>";
                }mysqli_close($c);
            ?>
        </tbody>
    </table>
@endsection

