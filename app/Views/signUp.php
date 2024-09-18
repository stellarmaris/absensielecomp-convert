<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,<!DOCTYPE html>
<html lang=" en">

    <head>
        <title>Absensi Elecomp</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="CRM">
        <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
        <link rel="shortcut icon" href="<?= base_url('/images/Logo.jpeg') ?>">

        <!-- FontAwesome JS-->
        <script defer src="<?php echo base_url('assets/plugins/fontawesome/js/all.min.js'); ?>"></script>

        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="<?php echo base_url('/css/portal.css'); ?>">
        <style>
            :root {
                --body-color: #eff0f7;
                --sidebar-color: #ffffff;
                --primary-color: #130c90;
                --primary-color-light: rgba(18, 13, 144, 0.04);
                --toggle-color: var(--primary-color);
                --toggle-color-hover: var(--primary-color-light);
                --text-color: rgba(0, 0, 0, 0.74);
                --text-color-hover: var(--primary-color);
                --text-color-selected: var(--primary-color-light);
                --border-color: #898989;
                --trans-01: all 0.1s ease-out;
                --trans-02: all 0.2s ease-out;
                --trans-03: all 0.3s ease-out;
                --trans-04: all 0.4s ease-out;
                --trans-05: all 0.5s ease-out;


            }

            .head {
                text-align: center;
                display: grid;
                /* row-gap: 1px; */
            }

            .title {

                font-size: 25px;
                font-weight: 700;
            }

            .subtitle {

                font-size: 15px;
                color: var(--text-color);
                margin: 0px !important;
            }

            .btn-log-in {
                background-color: #130c90;
                height: 50px;
                color: var(--sidebar-color);
                font-weight: 500;
                font-size: 14px;
                border-radius: 10px;

                border: none;
            }

            .auth-background-col {
                background-image: url('/images/hero-image2.jpg');
                /* Ganti dengan URL gambar Anda */
                background-size: cover;
                /* Agar gambar memenuhi seluruh elemen */
                background-position: center;
                /* Memusatkan gambar */
                background-repeat: no-repeat;
                /* Mencegah pengulangan gambar */
                height: 100vh;

                /* Tinggi elemen setara dengan tinggi layar */
            }

            label {

                font-size: 14px;
                font-weight: 600;
                color: var(--text-color);
                margin-bottom: 10px;
            }

            input {
                width: 100%;
                height: 40px;
                border-radius: 5px;
                padding: 10px 20px;
                border: 1px solid var(--border-color);
            }

            .trouble {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .trouble a {
                text-decoration: none;
                color: black;

            }

            .sign-up-link {

                font-size: 14px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 20px 0px;
            }

            .sign-up-link a {
                color: var(--primary-color);
                padding: 0px 3px;
                font-weight: 500;
                text-decoration: none;
            }
        </style>

    </head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-6 col-md-7 col-lg-6 auth-main-col  d-flex justify-content-center  " style="padding-top:10px">
            <div>
                <div class="head" style="padding-left:175px; padding-right:175px">
                    <p class="title ">Pendaftaran Absensi</p>
                    <p class="subtitle ">Haiii, masukkan detail informasi dirimu.</p>

                </div>
                <div class="" style="    padding-top:20px;">
                    <form class="auth-form login-form" method="post" action="<?= base_url('signUp') ?>">
                        <?= csrf_field(); ?>
                        <div class="email mb-3">
                            <div>
                                <label class="form-label">Nama Lengkap:</label>

                            </div>
                            <div>
                                <input type="text" class="" name="Nama" value="<?= set_value('Nama') ?>" placeholder="Cth: Ronaldowati" required>
                            </div>

                        </div>
                        <div class="row g-1 ">
                            <label class="form-label">Jenis Kelamin:</label>
                            <div class="mb-2 form-check col">
                                <input type="radio" class="form-check-input px-2 py-2" id="laki-laki" name="Jenis_kelamin" value="laki-laki" <?= set_radio('Jenis_kelamin', 'laki-laki') ?>>
                                <label class="form-check-label" for="laki-laki">Laki-Laki</label>

                            </div>
                            <div class="form-check col">
                                <input type="radio" class="form-check-input px-2 py-2" id="perempuan" name="Jenis_kelamin" value="Perempuan" <?= set_radio('Jenis_kelamin', 'Perempuan') ?>>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div><!--//form-group-->
                        <div class="row">
                            <div class="email mb-3 ">
                                <div>
                                    <label class="form-label">Asal Institusi:</label>
                                </div>
                                <div>
                                    <input type="text" class="" name="asal_institusi" value="<?= set_value('asal_institusi') ?>" placeholder="Cth: Universitas Brawijaya" required>

                                </div>

                            </div>

                        </div>


                        <div class="row">
                            <div class="email mb-3 col-6">
                                <label class="form-label">Nomor Telepon:</label>
                                <input type="text" class="" name="Nomor_telepon" placeholder="Cth: 082272112772" value="<?= set_value('Nomor_telepon') ?>" required>

                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="" name="email" placeholder="Cth: Ronaldowati21@gmail.com" value="<?= set_value('email') ?>" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <div class=" password-wrapper">
                                <input type="password" class="" name="password" id="password" placeholder="Setidaknya 8 karakter disertai angka dan spesial karakter" value="<?= set_value('password') ?>" required>
                                <i class="fas fa-eye toggle-password"></i>
                            </div>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn-log-in  w-100 theme-btn mx-auto">Sign Up</button>
                        </div>
                        <div class="sign-up-link">
                            <p>Have an account? <a href="/login">Sign In</a></p>

                        </div>
                    </form>

                </div>

            </div>

        </div><!--//auth-main-col-->
        <div class="col-6 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                </div>
            </div><!--//auth-background-overlay-->
        </div><!--//auth-background-col-->
    </div><!--//row-->
</body>

</html>