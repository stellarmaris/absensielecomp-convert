<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        body {
            background-color: #EFF0F7; 
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 1000px;
            margin-top: 20px;
            position: relative; 
        }

        .bold-text {
            font-weight: 900; 
        }

        .card {
            border-radius: 10px;
            overflow: hidden; 
            margin-bottom: -30px;
            max-width: 100%;
        }

        .box {
            max-width: 100%;
            margin-bottom: 10px;
            border-radius: 10px;
            height: 234px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .box1 {
            background-color: #B1DFE6; 
        }

        .box2 {
            background-color: #8BCFF1; 
        }

        .box3 {
            background-color: #5087F7; 
        }

        .box p {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: -10px; 
        }

        .box h1 {
            font-size: 100px;
            font-weight: bold;
            font-style: italic;
            margin: -10px; 
        }
        .custom-btn{
            color: white;
            background-color: #130C90;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(19, 12, 144, 0.04);
            
        }

        thead {
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

        .form-control {
            background-color: rgba(19, 12, 144, 0.04);
            font-size: 13px;
            margin-top : 30px;
        }

        .search-container {
            position: absolute;
            right: 0;
            top: 0;
            width: 300px; 
        }

        .search-container input {
            width: 100%;
        }

        .search-container i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .date-picker {
            width: 200px;
        }
        

        .pagination {
            display: flex;
            margin-bottom: 15px;
        }

        .pagination a {
            color: black;
            padding: 0 4px;
            text-decoration: none;
            margin: 0 1px;
            background-color: rgba(19, 12, 144, 0.04);
        }

        .pagination a.active {
            background-color: #130C90;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- kartu judul -->
        <div class="card title-card">
            <div class="card-body">
                <h4 class="card-title bold-text">Rekapitulasi</h4>
                <p class="card-text"><?= $tanggal_hari_ini ?></p>
            </div>
        </div>


        <!-- kartu sakit, izin, hadir -->    
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box1">
                        <p>HADIR</p>
                        <h1><?= $total_hadir ?></h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box2">
                        <p>SAKIT</p>
                        <h1><?= $total_sakit ?></h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box3">
                        <p>IZIN</p>
                        <h1><?= $total_izin ?></h1>
                    </div>
                </div>
            </div>
        </div>


        <!-- kartu judul2 -->
        <div class="card title-card">
            <div class="card-body">
                <h4 class="card-title bold-text">Rekapitulasi</h4>
                <p class="card-text">Total Rekapitulasi</p>
            </div>
        </div>

        <div class="container">
            <div class="row mb-2">
                <div>
                    <form action="<?= site_url('DashboardAdmin/Filtertanggal') ?>" method="get">
                        <input type="date" id="date" name="tanggal" class="form-control date-picker" value="<?= isset($tanggal_pilih) ? $tanggal_pilih : $tanggal_hari_ini ?>">
                        <button type="submit" class="btn custom-btn mt-2">Tampilkan Data</button>
                    </form>
                </div>
            </div>

            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //buat ngurutin data dari terbaru
                        usort($data_presensi, function($a, $b) {
                            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
                        });
                        //buat ngasih nomor
                        $nomor = 0;
                        foreach ($data_presensi as $k => $v) {
                            $nomor = $nomor + 1;
                        ?>
                    <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $v['tanggal'] ?></td>
                        <td><?php echo $v['Nama'] ?></td>
                        <td><?php echo $v['jam_masuk'] ?></td>
                        <td><?php echo $v['jam_keluar']?></td>
                        <td><?php echo $v['status']; ?></td>
                        <td>
                            <a href="<?= site_url('dashboardadmin/detail'); ?>" class="btn custom-btn">Detail</a>
                        </td>
                    </tr>
                   
                   <?php }?>
                </tbody>
            </table>

            <div class="row">
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

    <!-- Font Awesome for search icon -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    
</body>
</html>
