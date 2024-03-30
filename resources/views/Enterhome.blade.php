<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SE CAMP</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/css/adminlte.min.css') }}">
    @yield('css')
    <style>
        body {
            height: 100vh; /* ให้ body มีความสูงเท่ากับ viewport height เพื่อให้เนื้อหาอยู่กึ่งกลางแนวตั้ง */
            display: flex;
            justify-content: center; /* จัดให้เนื้อหาอยู่กึ่งกลางแนวนอน */
            align-items: center; /* จัดให้เนื้อหาอยู่กึ่งกลางแนวตั้ง */
            background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%); /* กำหนดพื้นหลังด้วยการใช้ linear gradient */
            font-family: 'Source Sans Pro', sans-serif; /* กำหนดรูปแบบตัวอักษร */
            margin: 0; /* ไม่มีระยะขอบ */
            padding: 0; /* ไม่มีระยะห่างภายใน */
        }

        .btn-wrapper {
            text-align: center; /* จัดให้เนื้อหาอยู่กึ่งกลางแนวนอน */
            margin-top: 20px; /* ระยะห่างด้านบนของปุ่ม */
        }

        .btn-warning {
            background-color: #000000; /* สีพื้นหลังของปุ่ม */
            color: #fff; /* สีตัวอักษร */
            border: none; /* ไม่มีเส้นขอบ */
            padding: 75px 150px; /* ขนาดของปุ่ม */
            font-size: 120px; /* ขนาดตัวอักษร */
            border-radius: 10px; /* มุมของปุ่ม */
            text-decoration: none; /* ไม่มีเส้นใต้ข้อความ */
            transition: background-color 0.3s; /* เอฟเฟกต์การเปลี่ยนสีพื้นหลัง */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* เพิ่มเอฟเฟกต์เงา */
        }

        .btn-warning:hover {
            background-color: #ffffff; /* เปลี่ยนสีพื้นหลังเมื่อเมาส์ชี้ไป */
            transform: translateY(-2px); /* เพิ่มเอฟเฟกต์การเคลื่อนไหว */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* เพิ่มเอฟเฟกต์เงา */
        }
    </style>
</head>
<body>
    <div class="btn-wrapper">
        <a href="/Home" class="btn btn-warning">Enter to Homepage</a>
    </div>
</body>
</html>
