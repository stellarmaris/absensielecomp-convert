<?= $this->extend('/layouts/admin_layout') ?>
<?= $this->section('customStyles') ?>
<style>
    /* Styling CSS */
    .custom-font {
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 10px;
        margin-bottom: 30px;
        max-width: 100%;
        box-shadow: 0.1px 4px 6px rgba(0, 0, 0, 0.1);
        padding-left: 20px;
        border: 2px solid #130C90;
    }

    .box-container {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        gap: 30px;
    }

    .box {
        border-radius: 10px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 40px;
        width: 200px;
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

    .box4 {
        background-color: #406BC4;
    }

    .box p {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 0px;
    }

    .box h1 {
        font-size: 100px;
        font-weight: bold;
        font-style: italic;
        margin: 0px;
    }

    .btn-danger {
        background-color: #130C90;
        color: white;
        border: none;
        text-decoration: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: rgba(19, 12, 144, 0.04);
        font-size: 14px;
    }

    thead {
        background-color: #130C90;
    }

    th,
    td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
        vertical-align: middle;
    }

    th {
        color: white;
    }

    .date-picker {
        width: 200px;
        height: 40px;
        padding-left: 10px;
    }

    .custom-btn {
        width: 150px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        font-weight: bold;
        background-color: #130C90;
        border-radius: 10px;
        color: white;
        text-decoration: none;
        margin-top: 10px;
    }

    .custom-btn:hover {
        background-color: #0C074F;
    }

    .pagination {
        display: flex;
        margin-bottom: 15px;
        margin-top: 20px;
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
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card title-card">
    <div class="card-body">
        <h3 class="card-title bold-text"><?= esc($title) ?></h3>
        <p><em><?= $tanggal_hari_ini ?></em></p>
    </div>
</div>


<?php if (!empty($data_user) && is_array($data_user)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_user as $user): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($user['Nama']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['Jenis_kelamin']) ?></td>
                    <td><?= esc($user['Nomor_telepon']) ?></td>
                    <td><?= esc($user['alamat']) ?></td>
                    <td><a href="<?= site_url('detail-user/' . $user['id_magang']) ?>" class="custom-btn">Detail</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <?php if ($pager): ?>
        <div class="pagination">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>

<?php else: ?>
    <div class="alert alert-warning">Tidak ada data pengguna yang ditemukan.</div>
<?php endif; ?>
<?= $this->endSection() ?>