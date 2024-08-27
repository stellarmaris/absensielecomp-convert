<?= $this->extend('/layouts/admin_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/dashboardadmin.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- kartu judul -->
<div class="card title-card">
    <div class="card-body">
        <h3 class="card-title bold-text">Verifikasi Absensi</h3>
        <p><em><?= $tanggal_hari_ini ?></em></p>
    </div>
</div>

<!-- Tabel data presensi -->
<table class="table table-responsive">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jam Masuk</th>
            <th>Status</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Urutkan data dari terbaru
        usort($data_presensi, function($a, $b) {
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });
        // Nomor urut
        $nomor = 0;
        foreach ($data_presensi as $k => $v) {
            $nomor = $nomor + 1;
        ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $v['Nama'] ?></td>
            <td><?php echo $v['jam_masuk'] ?></td>
            <td><?php echo $v['verifikasi']; ?></td>
            <td>
                <a href="<?= site_url('dashboardadmin/delete/' . $v['id_presensi']); ?>" 
                class="btn btn-danger" 
                onclick="return confirm('Apakah Anda yakin ingin mengupdate data ini?');">Update</a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
<!-- Pagination -->
<div class="row">
    <div class="col-12 col-md-6">
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="<?= site_url('DashboardAdmin?page=' . ($currentPage - 1)) ?>">Sebelumnya</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="<?= site_url('DashboardAdmin?page=' . $i) ?>" class="<?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="<?= site_url('DashboardAdmin?page=' . ($currentPage + 1)) ?>">Selanjutnya</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- script buat word-break setelah 5 kata -->
<script>
    document.querySelectorAll('.custom-column').forEach(cell => {
        let words = cell.innerText.split(' ');
        for (let i = 5; i < words.length; i += 6) {
            words[i] = '<br>' + words[i];
        }
        cell.innerHTML = words.join(' ');
    });
</script>
<?= $this->endSection() ?>
