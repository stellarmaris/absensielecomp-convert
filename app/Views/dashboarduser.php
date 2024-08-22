<?= $this->extend('/layouts/user_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/dashboarduser.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="title-card custom-font">
        <div class="card-body">
            <h2 class="card-title bold-text">Selamat Datang Kembali, <?= $nama ?>!</h2>
            <p class="card-text">Silakan pilih opsi di bawah ini untuk mencatat kehadiran Anda.</p>
        </div>
    </div>
    <!-- kartu check-in -->
    <div class="card check-in custom-font">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a href="/check-in-form" class="btn btn-primary custom-btn">CHECK - IN</a>
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
            <a href="/checkout" class="btn btn-primary custom-btn">CHECK - OUT</a>
        </div>
    </div>

    <!-- kartu absen -->
    <div class="card check-in custom-font">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a href="/izin-form" class="btn btn-primary custom-btn">TIDAK HADIR</a>
            <div class="right-aligned-text">
                <h1 class="card-title bold-text">TIDAK HADIR</h1>
                <p class="card-text bold-text">Gunakan "Tidak Hadir" untuk mencatat status cuti atau sakit.</p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>