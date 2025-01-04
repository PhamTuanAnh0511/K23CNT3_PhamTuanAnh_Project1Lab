<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm mới sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container">
        <form action="{{route('ptasinhvien.CreateSumbit')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h1>Thêm mới sinh viên</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="ptaMaSV" class="col-sm-2 col-form-label">Mã SV</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptaMaSV" name="ptamasv" placeholder="Nhập mã sinh viên">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptahosv" class="col-sm-2 col-form-label">Họ SV</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptahosv" name="ptahosv" placeholder="Nhập họ sinh viên">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptatensv" class="col-sm-2 col-form-label">Tên SV</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptatensv" name="ptatensv" placeholder="Nhập tên sinh viên">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptaphai" class="col-sm-2 col-form-label">Giới tính</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptaphai" name="ptaphai" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptangaysinh" class="col-sm-2 col-form-label">Ngày sinh</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="ptangaysinh" name="ptangaysinh" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptanoisinh" class="col-sm-2 col-form-label">Nơi sinh</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptanoisinh" name="ptanoisinh" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptamakh" class="col-sm-2 col-form-label">Mã KH</label>
                        <div class="col-sm-10">
                            <select name="ptamakh" id="ptamakh">
                                <option value="">-- Chọn khoa --</option>
                                <option value="CNT">-- Công nghệ thông tin --</option>
                                <option value="QHC">-- Quan hệ công chúng --</option>
                                <option value="NNT">-- Ngôn ngữ Trung --</option>
                                <option value="KT">-- Kế toán --</option>
                                <option value="TKDD">-- Thiết kế đồ họa --</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptahocbong" class="col-sm-2 col-form-label">Học bổng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptahocbong" name="ptahocbong">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ptaDTB" class="col-sm-2 col-form-label">DTB</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptaDTB" name="ptaDTB">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/ptasinhvien" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>