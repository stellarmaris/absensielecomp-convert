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
        .container {
            width: 100%;
            max-width: 1000px;
            margin-top: 20px;
        }
        body {
            background-color: #EFF0F7; 
        }
        .custom-btn {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-weight: bold; 
            background-color: #130C90;
            border-radius: 10px;
            margin: 0 auto;
            color: white;
        }
        .custom-btn:hover {
            background-color: #0C074F;
        }
        .bold-text {
            font-weight: 900; 
        }
        .card {
            margin-bottom: 15px;
            border-radius: 10px;
            overflow: hidden; 
        }
        .form-group {
            margin-bottom: 20px;
        }
        .card-title {
            margin-left: 10px;
            font-size: 25px; 
        }
        .form-label {
            font-weight: 500; 
            font-size: 20px; 
        }
        .profile .form-control {
            padding: 20px;
            background-color: #F6F5FB; 
            box-shadow: none;
            border:none;
            border-radius: 10px;
            font-size: 18px; 
            font-weight: bold; 
            height: 40px; 
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- container -->
    <div class="container">
    <!-- kartu judul -->
    <div class="card title-card custom-font">
        <div class="card-body">
            <h3 class="card-title bold-text">DETAIL</h3>
        </div>
    </div>
    <!-- kartu profil -->
    <div class="card profile custom-font">
        <div class="card-body">
            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="Bintang Pamungkas" readonly>
            </div>
            <div class="form-group">
                <label for="institusi" class="form-label">Asal Institusi</label>
                <input type="text" id="institusi" name="institusi" class="form-control" value="Universitas Brawijaya" readonly>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="2024-05-03" readonly>
                    </div>
                    <div class="col">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" id="status" name="status" class="form-control" value="Hadir" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <label for="masuk" class="form-label">Jam Masuk</label>
                    <input type="time" id="masuk" name="masuk" class="form-control" value="08:00" readonly>
                    </div>
                    <div class="col">
                    <label for="pulang" class="form-label">Jam Pulang</label>
                    <input type="time" id="pulang" name="pulang" class="form-control" value="16:00" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Foto</label>
                <input type="email" id="email" name="email" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Kegiatan Hari Ini</label>
                <input type="email" id="email" name="email" class="form-control" readonly>
            </div>
            <a href="<?= site_url('dashboardadmin/index'); ?>" class="btn custom-btn">Kembali</a>
        </div>
    </div>
</div>
</body>
</html>

