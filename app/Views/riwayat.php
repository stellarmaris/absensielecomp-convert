<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Presensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
           @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        body {
            background-color: rgba(19, 12, 144, 0.04);
            padding: 12px;
            font-family:"Poppins", sans-serif
        }
        .container {
            max-width: 900px;
            padding: 4px;
        }
        .nav {
            background-color: white;
            font-size: 20px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 10px;
        }
        .box {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 13px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(19, 12, 144, 0.04);
            
        }
        thead{
            background-color: #130C90;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            color: white;
        }
        .form-control{
            background-color:  rgba(19, 12, 144, 0.04);
            font-size: 13px;
        }
        .pagination{
            display:flex;
            justify-content: right;
            
        }
        .pagination a{
            color: black;
            padding: 0 4px;
            text-decoration: none;
            margin: 0 1px;
            background-color:rgba(19, 12, 144, 0.04);
        }
        .pagination a.active{
            background-color: #130C90;
            color: white;
        }
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        .search-container{
            position: relative;
        }

        .search-container input{
            padding-right: 30px;
        }

        .search-container i{
            position:absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">Riwayat</div>
        <div class="box">
            <div class="row mb-2">
                <div class="col-md-6 mb-2 mb-md-0">
                    <input type="date" id="date" class="form-control">
                </div>
                <div class="col-md-6">
                    <div class="search-container">
                        <input type="text" id="search" class="form-control " placeholder="Search...">
                        <i class="fas fa-search"></i>
                    </div>
                    
                </div>
            </div>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024-05-03</td>
                        <td>08.00</td>
                        <td>16.00</td>
                        <td>Membuat video digital marketing</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2024-05-03</td>
                        <td>08.00</td>
                        <td>16.00</td>
                        <td>Membuat video digital marketing</td>
                    </tr>
                   
                </tbody>
            </table>
            <div class="row">
                <div class="col-12 col-md-6">Menampilkan <strong>5</strong> dari <strong>25</strong> entri</div>
                <div class="col-12 col-md-6">
                    <div class="pagination">
                        <a href="#">Sebelumnya</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">Selanjutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
