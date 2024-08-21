
<?= $this->extend('/layouts/user_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/riwayat.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
        <div class="box">
        <div class="title">Riwayat</div>
                <div class="col-md-3 mb-2 mb-md-0">
                    <form action="/riwayat" method="get" class="input-group mb-3">
                        <input type="date" name ="tanggal" id="date" class="form-control" value="<?= esc($tanggal)?>">
                        <button type="submit" class="btn" style="background-color: #130C90; color:white">Filter</button>                   
                    </form>
                </div>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Status</th>
                        <th>Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($data_presensi)>0):?>
                        
                        <?php 
                        
                        foreach ($data_presensi as $index => $v): ?>
                        <tr>
                            <td><?= (($currentPage-1) * $perPage) + ($index+1) ?></td>
                            <td><?php echo $v['tanggal'] ?></td>
                            <td><?php echo $v['jam_masuk'] ?></td>
                            <td><?php echo $v['jam_keluar']?></td>
                            <td><?php echo $v['status']?></td>
                            <td><?php echo $v['kegiatan']; ?></td>
                        </tr>
                    
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center;"> Data Tidak Ditemukan</td>
                        </tr>
                    <?php endif?>
                </tbody>
            </table>
            </div>

                    <div class="pagination">
                       <?= $pager->links('presensi','custom') ?>
                    </div>
        </div>
    </div>


    <div class="container">
<!-- Your content here -->
<?= $this->endSection() ?>
