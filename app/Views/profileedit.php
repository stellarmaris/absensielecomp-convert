<?= $this->extend('/layouts/user_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/profileedit.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="title">
    <h2> Edit Profil</h2>
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
            <div class="form-row">
                <div class="form-group flex-item">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= esc($nama) ?>">
                </div>
                <div class="form-group flex-item">
                    <label for="institusi" class="form-label">Asal Institusi</label>
                    <input type="text" id="institusi" name="institusi" class="form-control" value="<?= esc($institusi) ?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group flex-item">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="<?= esc($jenis_kelamin) ?>" readonly>
                </div>
                <div class="form-group flex-item">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="tel" id="telepon" name="telepon" class="form-control" value="<?= esc($telepon) ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group flex-item">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= esc($email) ?>" readonly>
                </div>
                <div class="form-group flex-item">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?= esc($alamat) ?>">
                </div>
            </div>

            <div class="form-group password-field">
                <div class="form-group flex-item">
                    <label for="kata_sandi" class="form-label">Kata Sandi</label>
                    <input type="password" id="kata_sandi" name="password" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary custom-btn">Simpan Perubahan</button>
        </form>
    </div>
</div>
    <?= $this->endSection() ?>