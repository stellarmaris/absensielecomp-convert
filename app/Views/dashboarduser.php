<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        .container {
            max-width: 1000px;
            margin-top: 20px;
        }
        .custom-font {
            font-family: 'Inter', sans-serif; 
        }
        body{
            background-color: #EFF0F7; 
        }
        .custom-btn {
            width: 370px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: bold; 
            background-color:#130C90;
            border-radius: 10px;
        }
        .custom-btn:hover {
            background-color: #0C074F;
        }
        .right-aligned-text {
            text-align: right;
            margin-right: 20px;
        }
        .bold-text {
            font-weight: 900; 
        }
        .card {
            margin-bottom: 15px;
            border-radius: 10px;
            overflow: hidden; 
            
        }
        .card-checkout .right-aligned-text {
            text-align: left; 
            margin-right: 0;
        }
        .card-checkout .custom-btn {
            margin-left: auto;
        }
    </style>
</head>
<body>
  <!-- container -->
<div class="container">
    <!-- kartu judul -->
    <div class="card title-card custom-font">
        <div class="card-body">
            <h2 class="card-title bold-text">Selamat Datang Kembali, <?= $nama ?>!</h2>
            <p class="card-text bold-text">Silakan pilih opsi di bawah ini untuk mencatat kehadiran Anda.</p>
        </div>
    </div>
    <!-- kartu check-in -->
    <div class="card check-in custom-font">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-primary custom-btn">CHECK - IN</a>
            <div class="right-aligned-text">
                <h1 class="card-title bold-text">CHECK - IN</h1>
                <p class="card-text bold-text">Gunakan tombol "Check In" untuk mencatat kehadiran Anda dengan tepat.</p>
            </div>
        </div>
    </div>

    <!-- kartu check-out -->
    <div class="card check-in custom-font card-checkout">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h1 class="card-title bold-text">CHECK - OUT</h1>
                <p class="card-text bold-text">Gunakan tombol "Check Out" untuk mencatat kehadiran Anda dengan tepat.</p>
            </div>
            <a href="#" class="btn btn-primary custom-btn">CHECK - OUT</a>
        </div>
    </div>

    <!-- kartu absen -->
    <div class="card check-in custom-font">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-primary custom-btn">TIDAK HADIR</a>
            <div class="right-aligned-text">
                <h1 class="card-title bold-text">TIDAK HADIR</h1>
                <p class="card-text bold-text">Gunakan "Tidak Hadir" untuk mencatat status cuti atau sakit.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

