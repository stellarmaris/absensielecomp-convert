<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!--include leaflet css-->
        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
            integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
            crossorigin=""/>
            <link
                rel="stylesheet"
                href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"
            />
            <link
                rel="stylesheet"
                href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"
            />
        <style>
            #map, #map1{ 
                height: 250px; 
                margin-bottom: 20px;
               
            }
             
            .form-control{
                background-color:  rgba(19, 12, 144, 0.04);
                font-size: 13px;
            }
            .container{
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 13px;
            max-width: 900px;
            }
            body{
            background-color: rgba(19, 12, 144, 0.04);
            padding: 12px;
            font-family:"Poppins", sans-serif
        }
        .title{
            font-weight: bold;
            font-size: 14px;
           
        }
        .info{
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        </style>
        <!--include javascript-->
        <script
            src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
            integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
            crossorigin="">
        </script>
        <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

        <title>Lokasi</title>
    </head>
    <body>

       <div class="container">
            <div class="info">
                <h1>Lokasi</h1>
                <p>Daftar lokasi check-in dan check-out member<p>
            </div>
            
            
            <div class="col-md-6 ms-auto">
                    <form action="/lokasiSemua" method="get" class="input-group " >
                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                        <button type="submit" class="btn" style="background-color: #130C90; color:white">Filter</button>
                    </form>
                        
            </div>
            <div class="col-md-6 mb-3 title">Lokasi Masuk</div>
             <div id="map"></div>
            
            <div class="col-md-6 title">Lokasi Keluar</div>
            <div id="map1"></div>
         
            
        </div>
       
        <script>

            //map (buat checkin)
            var map = L.map('map').setView([-7.981298, 112.631926], 13);
                      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                   maxZoom: 19,
                                   attribution: '© OpenStreetMap'
                                 }).addTo(map);
           
            var markers = L.markerClusterGroup();
            
            <?php foreach ($presensi as $dataPresensi): ?>
                <?php if($dataPresensi['checkIn_latitude'] !== null && $dataPresensi['checkin_longitude'] !== null ):?>
               var marker= L.marker([<?= $dataPresensi['checkIn_latitude']?>,<?= $dataPresensi['checkin_longitude']?>])
                    .bindPopup("<?=$dataPresensi['Nama'] ?>")
                markers.addLayer(marker);

                <?php endif; ?>
            <?php endforeach ?>
            map.addLayer(markers);

            // Map 1(buat checkout)
                var map1 = L.map('map1').setView([-7.981298, 112.631926], 13); 
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map1);

            var markers1 =L.markerClusterGroup();

            <?php foreach ($presensi as $dataPresensi): ?>
                <?php if($dataPresensi['checkout_latitude'] !== null && $dataPresensi['checkout_longitude'] !== null): ?>
                   var marker1= L.marker([<?= $dataPresensi['checkout_latitude'] ?>, <?= $dataPresensi['checkout_longitude'] ?>])
                        .bindPopup("<?= $dataPresensi['Nama'] ?>")
                 
                    markers1.addLayer(marker1);
                <?php endif ?>
            <?php endforeach; ?>

            map1.addLayer(markers1);
           
        </script>
    </body>
</html>