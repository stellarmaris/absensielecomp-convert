<?php
$statusIzin = session()->getFlashdata('status_izin');
$judul = "Selamat Izin Disetujui!";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Izin</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }

        img {
            max-width: 300px;
            height: auto;
        }

        .title {
            margin-top: 20px;
        }

        a {
            padding: 10px 20px;
            border-radius: 50px;
            background-color: #130C90;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <img id="randomImage" src="" alt="Random Image">
        </div>

        <div class="title">
            <h1><?= $judul ?></h1>
            <p class="sub-judul" id="subJudul"></p>
        </div>
        <div style="margin-top: 30px;">
            <a href="/home">Kembali Dashboard</a>
        </div>
    </div>

</body>
<script>
    const statusIzin = "<?= $statusIzin ?>";

    const subJudulSakit = [
        "Rehat dulu ya, kesehatanmu lebih penting dari deadline!",
        "Cepat sembuh, biar bisa balik lagi dengan energi baru!",
        "Jangan lupa vitamin dan tidur yang cukup, kerjaan bisa menunggu.",
        "Kamu rebahan, kami yang pegang kendali dulu.",
        "Sehat dulu, nanti baru kita kejar target bareng!",
        "Semoga lekas pulih, biar bisa join rapat dengan senyum lagi!",
        "Hari ini mending rebahan aja, kerjaan besok juga masih ada.",
        "Sakit bukan halangan, tapi alasan buat istirahat total!",
        "Minum obat, tidur nyenyak, kami tunggu kehadiranmu lagi.",
        "Sehat-sehat ya! Pekerjaan bisa menunggu, tapi kesehatan nggak!"
    ];

    const subJudulIzin = [
        "Nikmati waktunya, kami jagain kantor sementara.",
        "Pergi dengan tenang, balik dengan cerita seru!",
        "Selamat menikmati hari izinnya, jangan lupa kembali dengan semangat baru!",
        "Ambil waktu istirahat, kami siapkan suasana menyambut kembalimu!",
        "Izinnya aman, kamu juga harus tenang!",
        "Break dulu, nanti kita siap berjuang lagi!",
        "Santai aja, kami handle semuanya sementara kamu izin.",
        "Izinnya disetujui! Bawa pulang oleh-oleh semangat ya!",
        "Nggak perlu khawatir, semua sudah beres di sini!",
        "Izinnya approved, tinggal nikmati dan kembali dengan fresh!"
    ];

    const images = [
        '/images/image1.png',
        '/images/image2.png',
        '/images/image3.png',
        '/images/image4.png',
        '/images/image5.png',
        '/images/image6.png',
        '/images/image7.png',
        '/images/image8.png',
        '/images/image9.png',
        '/images/image10.png',
        '/images/image11.png',
        '/images/image12.png',
    ];

    const subJudul = statusIzin === 'sakit' ? subJudulSakit : subJudulIzin;
    const randomIndex = Math.floor(Math.random() * subJudul.length);

    document.getElementById('randomImage').src = images[Math.floor(Math.random() * images.length)];
    document.getElementById('subJudul').innerText = subJudul[randomIndex];
</script>

</html>