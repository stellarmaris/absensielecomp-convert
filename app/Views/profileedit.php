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
        body {
            background-color: #EFF0F7; 
        }
        .custom-btn {
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold; 
            background-color: #130C90;
            border-radius: 10px;
            margin: 0 auto;
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
            font-size: 18px; 
            margin-left: 12px;
        }
        .profile .form-control {
            padding: 20px;
            background-color: #F6F5FB; 
            border: 2px solid #130C90;
            border-radius: 10px;
            font-size: 16px; 
            font-weight: bold; 
            height: 40px; 
            width: 100%;
        }
        .profile .form-control[readonly] {
            border: none;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <!-- container -->
    <div class="container">
        <!-- kartu judul -->
        <div class="card title-card custom-font">
            <div class="card-body">
                <h3 class="card-title bold-text">EDIT PROFIL</h3>
            </div>
        </div>

        <!-- Alert for validation errors -->
        <?php if (session()->getFlashdata('validation')): ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach (session()->getFlashdata('validation')->getErrors() as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- kartu profil -->
        <div class="card profile custom-font">
            <div class="card-body">
                <form action="<?= base_url('/profile/update') ?>" method="post">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="<?= esc($nama) ?>">
                    </div>
                    <div class="form-group">
                        <label for="institusi" class="form-label">Asal Institusi</label>
                        <input type="text" id="institusi" name="institusi" class="form-control" value="<?= esc($institusi) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="<?= esc($jenis_kelamin) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="tel" id="telepon" name="telepon" class="form-control" value="<?= esc($telepon) ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= esc($email) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" value="<?= esc($alamat) ?>">
                    </div>
                    <div class="form-group password-field">
                        <label for="kata_sandi" class="form-label">Kata Sandi</label>
                        <input type="password" id="kata_sandi" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary custom-btn">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
