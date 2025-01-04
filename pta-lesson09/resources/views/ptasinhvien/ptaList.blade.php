<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container">
        <div class="card">
            <div class="carh-header">
                <h1>Danh sách sinh viên </h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã SV</th>
                            <th>Họ SV</th>
                            <th>Tên SV</th> 
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Nơi sinh</th>
                            <th>Mã khoa</th>
                            <th>Học bổng</th>
                            <th>Điểm TB</th>
                            <th>Chức năng</th>                     
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt=1;
                        @endphp
                        @foreach ($ptasinhvien as $item)
                        <tr>
                            <td class="text-center">{{$stt}}</td>
                            <td>{{ $item -> ptamasv}}</td>
                            <td>{{ $item -> ptahosv}}</td>
                            <td>{{ $item -> ptatensv}}</td>
                            <td>{{ $item -> ptaphai}}</td>
                            <td>{{ $item -> ptangaysinh}}</td>
                            <td>{{ $item -> ptanoisinh}}</td>
                            <td>{{ $item -> ptamakh}}</td>
                            <td>{{ $item -> ptahocbong}}</td>
                            <td class="text-right">{{ $item -> ptaDTB}}</td>
                            <td class="text-center">
                                /View/ Edit/ Delete
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h3>Tổng số sinh viên: {{$ptasinhvien -> count()}}</h3>
                <a href="/ptasinhvien/ptaCreate" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>
    </section>
</body>
</html>