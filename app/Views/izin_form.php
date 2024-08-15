<?= $this->extend('/layouts/user_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/dashboard.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
    <h2>Form Perizinan</h2>
</div>

<form action="/izin-form" method="post" enctype="multipart/form-data">
    <div class="group">
        <div class="form">
            <div class="label"><label for="date">Tanggal Perizinan</label></div>
            <div class="input"> <input type="date" name="date" id="date"></div>
        </div>
        <div class="form">
            <div class="label"><label for="time">Waktu Perizinan</label></div>
            <div class="input">
                <input type="time" name="time" id="time">
            </div>
        </div>
    </div>
    <div class="form-1">
        <div class="label"><label for="status">Status Perizinan</label></div>
        <div class="input">
            <input type="text" name="status" id="status">
        </div>
    </div>
    <div class="form-1">
        <div class="label"><label for="status">Status Perizinan</label></div>
        <div class="input">
            <input type="file" name="foto">
        </div>
    </div>

    <div class="btn">
        <button type="submit">Upload</button>
    </div>

</form>
<?= $this->endSection() ?>