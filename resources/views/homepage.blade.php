
@extends('layouts.default') 

@section('page_name', 'Users Data') 

@section('content') 
    <!-- CODE HERE --> 

    <div class="float-right pb-4"> 
        <a href="/add-user" class="btn btn-success"> Add User </a> 
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

        <tbody> <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
            <?php foreach($data as $index => $datas) { ?> <!-- ทำการลูปตาราง และรับข้อมูลจากcontroller-->
            <tr>
                <td>{{$index+1}}</td> <!--เลขโรล-->
                <td>{{$datas -> name}}</td> <!--ชื่อ -->
                <td>{{$datas -> email}}</td> <!--อีเมล -->
                <td><img src="{{ asset($datas -> avatar)}}" alt="" style="width:200px "> </td><!--รูปภาพ --> 
                <td>                    
                    @foreach ($data_title as $title)
                    @if ($datas-> title_id == $title -> id)<!--หาตัวtitle เทียบกัน-->
                        {{$title -> tit_name}}
                    @endif<!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                    @endforeach<!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                </td> <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                <td> <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                
                    <form action="/{{$datas -> id}}" method = "POST"><!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                        <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a><!--แก้ไขข้อมูล-->
                        @csrf <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                        @method('DELETE') <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                        <button type = "submit" class="btn btn-danger">Delete</button> <!--ลบข้อมูล-->
                        <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                    </form><!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
                </td> 
            </tr> <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
            <?php } ?> <!-- 65160108 นาย ปุณณะวิชญ์ เชียนพลแสน-->
        </tbody> 
    </table> 

@endsection 
