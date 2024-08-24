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
            <select name="status" id="status">
                <option value="sakit">Sakit</option>
                <option value="izin">Izin</option>
            </select>
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
<script>
    const waktu = new Date();
    const year = String(waktu.getFullYear());
    const month = String(waktu.getMonth() + 1).padStart(2, '0');
    const date = String(waktu.getDate()).padStart(2, '0');
    const hour = String(waktu.getHours()).padStart(2, '0');
    const minute = String(waktu.getMinutes()).padStart(2, '0');

    const TimeNow = `${hour}:${minute}`
    const DateNow = `${year}-${month}-${date}`;
    document.getElementById('date').value = DateNow;
    document.getElementById('time').value = TimeNow;
    // Geolocation untuk mendapatkan posisi saat ini
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation tidak didukung oleh browser ini.");
        }
    }
</script>
<?= $this->endSection() ?>