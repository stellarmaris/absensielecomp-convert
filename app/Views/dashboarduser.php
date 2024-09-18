<?= $this->extend('/layouts/user_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/dashboarduser.css">


<!-- Tambahkan CSS khusus untuk mendisable link -->
<style>
    .card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .title-card h2 {
        font-size: 24px;
        font-weight: bold;
    }

    .custom-font p {
        font-size: 16px;
    }

    .bold-text {
        font-weight: bold;
    }

    .check-in,
    .card-checkout {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .right-aligned-text {
        text-align: right;
    }

    .custom-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .custom-btn:hover {
        background-color: #0056b3;
    }

    .disabled-link {
        background-color: gray;
        cursor: not-allowed;
        pointer-events: none;
    }

    h1 {
        font-size: 22px;
    }

    .mb-3 {
        margin-bottom: 20px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="title-card custom-font mb-3">
    <div class="card-body">
        <h2 class="card-title bold-text">Selamat Datang Kembali, <?= $nama ?>!</h2>
        <p class="card-text">Silakan pilih opsi di bawah ini untuk mencatat kehadiran Anda.</p>
    </div>
</div>

<!-- kartu check-in -->
<div class="card check-in custom-font mb-3">
    <a href="/check-in-form" class="custom-btn <?= $hasPresensi ? 'disabled-link' : '' ?>">CHECK - IN</a>
    <div class="right-aligned-text">
        <h1 class="card-title bold-text">CHECK - IN</h1>
        <p class="card-text bold-text">Gunakan tombol "Check In" untuk mencatat kehadiran Anda dengan tepat.</p>
    </div>
</div>

<!-- kartu check-out -->
<div class="card check-in custom-font card-checkout mb-3">
    <div>
        <h1 class="card-title bold-text">CHECK - OUT</h1>
        <p class="card-text bold-text">Gunakan tombol "Check Out" untuk mencatat kehadiran Anda dengan tepat.</p>
    </div>
    <a href="/checkout" class="custom-btn <?= $hasCheckedin && !$hasCheckedOut && !$isIzin ? '' : 'disabled-link' ?>">CHECK - OUT</a>
</div>

<!-- kartu absen -->
<div class="card check-in custom-font mb-3">
    <a href="/izin-form" class="custom-btn <?= $hasPresensi ? 'disabled-link' : '' ?>">TIDAK HADIR</a>
    <div class="right-aligned-text">
        <h1 class="card-title bold-text">TIDAK HADIR</h1>
        <p class="card-text bold-text">Gunakan "Tidak Hadir" untuk mencatat status cuti atau sakit.</p>
    </div>
</div>

<?= $this->endSection() ?>