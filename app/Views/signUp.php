<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        .container{
           max-width: 500px; 
           background-color: white; 
           /* margin-top: 20px;
           margin-bottom: 20px; */
          border-radius: 10px;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.25);
          font-family:"Poppins", sans-serif
        }

        .container h2{
            font-size: 25px;
        }
        .container p{
            font-size: 13px;
        }

        .form-control{
            border-radius: 10px;
            background-color: rgba(19, 12, 144, 0.04);
            font-size: 13px;
        }

        .form-label, .form-check-label, .form-check-input{
            font-size: 14px;
        }

        body {
            background-image: url('/images/Sign In 1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container p-4 border">
        <form>
           <div class="mb-4" style="text-align: center;">
                <h2>Pendaftaran Absensi</h2>
                <p>Hai, masukkan detail informasi dirimu.</p>
           </div>
            
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Cth: Ronaldowati">
            </div>
            <div class="row g-1">
                <label class="form-label">Jenis Kelamin</label>
                <div class=" mb-2 form-check col">
                    <input type="radio" class="form-check-input" id="radio2" name="gender" value="laki-laki">
                    <label class="form-check-label" for="radio2">laki-laki</label>
                </div>
                <div class="form-check col" >
                    <input type="radio" class="form-check-input" id="Female" name="gender" value="Perempuan">
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" placeholder="Cth: 082272112772">
            </div>
            <div class="mb-3">
                 <label class="form-label">Email</label>
                 <input type="email" class="form-control" placeholder="Cth: Ronaldowati21@gmail.com">
            </div>
            <div class="mb-5">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Setidaknya 16 karakter disertai angka dan spesial karakter">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn mb-2" style="background-color: #130C90; color:white;"><strong>Daftar</strong></button>
            </div>
            <p style="text-align: center;">Sudah punya akun? <a href="#" style="color:#130C90"><strong>Masuk</strong></a></a></p>
                
        </form>
    </div>
</body>
</html>