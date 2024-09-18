<?= $this->extend('/Layouts/admin_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/grafik.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- kartu judul -->
    <div class="card title-card">
        <div class="card-body">
            <h3 class="card-title bold-text">Statistik Absensi</h3>
            <p>Rekapitulasi Absensi Dalam Bentuk Diagram dan Grafik</p>
        </div>
    </div>


    <!-- Chart per hari dan per bulan -->
    <div class="chart-container">
    <div class="kartu">
        <h5>Chart Presensi Per Hari</h5>
        <!-- Filter form -->
        <div class="filter">
                <form action="<?= site_url('/SummaryPresensiController/filterTanggal') ?>" method="get" class="d-flex">
                    <input type="date" id="date" name="tanggal" class="form-control custom" value="<?= isset($tanggalDipilih) ? $tanggalDipilih : date('Y-m-d') ?>">
                    <button type="submit" class="btn custom-btn">Tampilkan Data</button>
                </form>
            </div>
            <canvas id="myPieChart"></canvas>
        </div>
        
        <!-- === GRAFIK GARIS === -->
       <div class="kartuGaris">
            <h5>Chart Presensi Per Tanggal</h5>
                <form action="<?= base_url('/summary-presensi')?>" method="GET">
                    <div class="filterDate">
                        <div class="tglAwal">
                            <label for="start_date">Dari Tanggal:</label>
                            <input type="date" id="start_date" name="start_date" value="<?= esc($startDate) ?>" placeholder="Tanggal Awal" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>
                        <div class="tglAwal">
                            <label for="end_date">Sampai Tanggal:</label>
                            <input type="date" id="end_date" name="end_date" value="<?= esc($endDate)?>" placeholder="Tanggal Akhir" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>
                        <button type="submit" class="btn custom-btn" style="margin-top:6px">Tampilkan Data</button>
                    </div>
                </form>
            
            <canvas id="LineChart" ></canvas>
        </div>
    </div>

    <div class="kartu2">
        <h5>Chart Presensi Per Tahun</h5>
        <!-- Filter form -->
        <div class="filter">
            <form action="<?= site_url('/SummaryPresensiController/filter') ?>" method="get" class="d-flex">
                <select id="year" name="tahun" class="form-control custom">
                    <option value="">Pilih Tahun</option>
                    <?php
                    $currentYear = date('Y');
                    for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
                        $selected = (isset($tahunDipilih) && $tahunDipilih == $i) ? 'selected' : '';
                        echo "<option value=\"$i\" $selected>$i</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn custom-btn">Tampilkan Data</button>
            </form>
        </div>

        <!-- Chart per tahun -->
        <div class="chart-container">
            <canvas id="presensiChart"></canvas>
        </div>
    </div>
</div>

<script>
    // Data dari PHP
    const dataPerBulan = <?= json_encode($presensi_perbulan) ?>;
    const allMonths = {
        1: 'Januari', 2: 'Februari', 3: 'Maret', 4: 'April', 5: 'Mei', 6: 'Juni',
        7: 'Juli', 8: 'Agustus', 9: 'September', 10: 'Oktober', 11: 'November', 12: 'Desember'
    };
    const labelsBulan = Object.keys(allMonths).map(bulan => allMonths[bulan]);
    const datasetLabels = ['WFO', 'WFH', 'Sakit', 'Izin', 'Alpha'];
    const datasetColors = ['#66BB6A', '#42A5F5', '#FFCA28', '#FF8A65', '#EF5350'];

    const datasets = datasetLabels.map((label, index) => ({
        label: label,
        data: labelsBulan.map((_, index) => {
            const bulan = index + 1;
            return dataPerBulan[bulan] ? dataPerBulan[bulan][label] || 0 : 0;
        }),
        backgroundColor: datasetColors[index],
        borderColor: datasetColors[index],
        borderWidth: 1
    }));

    const ctx = document.getElementById('presensiChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labelsBulan,
            datasets: datasets
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: { display: true, text: 'Bulan' }
                },
                y: {
                    title: { display: true, text: 'Jumlah' },
                    ticks: { min: 1, stepSize: 1 }
                }
            }
        }
    });

    // Pie Chart per hari
    const ctxPie = document.getElementById('myPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['WFO', 'WFH', 'Sakit', 'Izin', 'Alpha'],
            datasets: [{
                label: 'Presensi Status',
                data: [<?= $wfoCount ?>, <?= $wfhCount ?>, <?= $sakitCount ?>, <?= $ijinCount ?>, <?= $alphaCount ?>],
                backgroundColor: ['#66BB6A', '#42A5F5', '#FFCA28', '#FF8A65', '#EF5350']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' }, tooltip: { enabled: true } }
        }
    });

    //============== grafik garis ===============

        //ambil data untuk grafik garis
        const presensiPerTanggal = <?= json_encode($presensiPerTanggal)?>;
        const tanggalLabels = Object.keys(presensiPerTanggal);
        
        //buat dataset setiap status
        const datasetsGaris = datasetLabels.map((label, index)=>({
            label:label,
            data: tanggalLabels.map(tanggal =>presensiPerTanggal[tanggal][label] || 0),
            fill:false,
            borderColor: datasetColors[index],
            tension:0.1,
            borderWidth: 3,
        }));

        //buat grafik garis
        const ctxLine = document.getElementById('LineChart').getContext('2d');
        new Chart(ctxLine,{
            type: 'line',
            data: {
                labels: tanggalLabels,
                datasets: datasetsGaris
            },
            options:{
                responsive:true,
                plugins: {
                    legend:{
                        position:'top',
                        display:true,
                        labels: {
                            usePointStyle: true, // Membuat tampilan legend berupa simbol bukan kotak
                            pointStyle: 'line', // Membuat legend berupa garis
                            
                            
                        }
                    },
                    
                    tooltip:{enabled: true}
                },
                scales:{
                    x:{
                        title: { display: true, text: 'Tanggal' },
                        offset: true,
                    },
                    y: {
                        title: { display: true, text: 'Jumlah Presensi' },
                        ticks: { beginAtZero: true, stepSize: 1}
                    }
                }
            }
        });

   
</script>


<?= $this->endSection() ?>
