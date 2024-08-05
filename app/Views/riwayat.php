<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Presensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        body {
            background-color: rgba(19, 12, 144, 0.04);
            padding: 12px;
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
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
           
        }
        th {
            background-color: #130C90;
            color: black;
        }
        td{
            
            background-color: rgba(19, 12, 144, 0.04);
        }
        .form-control{
            background-color:  rgba(19, 12, 144, 0.04)
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">Riwayat</div>
        <div class="box">
            <div class="row mb-2">
                <div class="col">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" id="date" class="form-control">
                </div>
                <div class="col">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" id="search" class="form-control" placeholder="Search...">
                </div>
            </div>
            <table class="table">
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
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
